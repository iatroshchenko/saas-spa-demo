<?php


namespace App\Service;


use App\ApiService\GoogleApiService;
use App\DTO\Credentials;
use App\Events\OrderInitiated;
use App\Http\Requests\Quote\CalculateQuotePriceRequest;
use App\Http\Requests\Quote\CreateQuoteRequest;
use App\Http\Requests\Quote\DeleteQuoteRequest;
use App\Http\Requests\Quote\EmailQuoteRequest;
use App\Http\Requests\Quote\GetQuoteRequest;
use App\Http\Requests\Quote\PayQuoteRequest;
use App\Http\Requests\Quote\RestoreQuoteRequest;
use App\Http\Requests\Quote\UpdateQuoteRequest;

use App\Models\Quote;
use App\Repository\QuoteRepository;
use App\Repository\ShipperRepository;
use App\TemplateMail\CredentialsTemplateMail;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\DB;
use App\Models\Shipper;
use App\Repository\QuoteDraftRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class QuoteManagementService
{
    private QuoteRepository $quotes;

    private QuoteDraftRepository $quoteDraft;

    /**
     * @var GoogleApiService
     */
    private GoogleApiService $googleApi;

    private ShipperRepository $shippers;

    private ClientManagementService $clientManagement;

    private LoadManagementService $loadManagement;

    public function __construct(
        QuoteRepository $quotes,
        QuoteDraftRepository $quoteDraft,
        ShipperRepository $shippers,
        GoogleApiService $apiService,
        ClientManagementService $clientManagement,
        LoadManagementService $loadManagement
    )
    {
        $this->quotes = $quotes;
        $this->quoteDraft = $quoteDraft;
        $this->googleApi = $apiService;
        $this->shippers = $shippers;
        $this->clientManagement = $clientManagement;
        $this->loadManagement = $loadManagement;
    }

    public function getQuotesForShipper(Shipper $shipper)
    {
        return $this
            ->quotes
            ->getQuotesForShipper($shipper);
    }

    public function getOrdersForShipper(Shipper $shipper)
    {
        return $this
            ->quotes
            ->getOrdersForShipper($shipper);
    }

    public function createQuoteFromRequest(CreateQuoteRequest $request, bool $isQuote = true): Quote
    {
        try {
            DB::beginTransaction();

            $clientId = $request->input('client_id');

            if (!$clientId) {
                $client = $this
                    ->clientManagement
                    ->createClientFromQuoteRequest($request, $isQuote);

                $request->merge([
                    'client_id' => $client->getPublicKey()
                ]);
            }

            $quote = $this
                ->quotes
                ->createFromRequest($request, $isQuote);

            $quoteShipper = $this
                ->quotes
                ->createQuoteShipperFromRequest($request, $quote);

            $quoteOrigin = $this
                ->quotes
                ->createQuoteOriginFromRequest($request, $quote);

            $quoteOriginCoordinates = $this
                ->googleApi
                ->getCoordinatesByAddress($quoteOrigin->getAddress());

            if ($quoteOriginCoordinates) {
                $quoteOrigin->update($quoteOriginCoordinates);
            }

            $quoteDestination = $this
                ->quotes
                ->createQuoteDestinationFromRequest($request, $quote);

            $quoteDestinationCoordinates = $this
                ->googleApi
                ->getCoordinatesByAddress($quoteDestination->getAddress());

            if ($quoteDestinationCoordinates) {
                $quoteDestination->update($quoteDestinationCoordinates);
            }

            $quoteVehicle = $this
                ->quotes
                ->createQuoteVehicleFromRequest($request, $quote);

            $quoteTransport = $this
                ->quotes
                ->createQuoteTransportFromRequest($request, $quote);

            DB::commit();

            return $quote;

        } catch (\Throwable $exception) {

            DB::rollBack();
            throw $exception;

        }
    }

    public function updateQuoteFromRequest(UpdateQuoteRequest $request): Quote
    {
        try {

            DB::beginTransaction();

            $quote = $this
                ->quotes
                ->findById($request->input('quote_id'));

            $quote->update([
                'status' => $request->input('status')
            ]);

            $quote->quoteShipper()->delete();
            $quote->quoteOrigin()->delete();
            $quote->quoteDestination()->delete();
            $quote->quoteTransport()->delete();
            $quote->quoteVehicle()->delete();

            $quoteShipper = $this
                ->quotes
                ->createQuoteShipperFromRequest($request, $quote);

            $quoteOrigin = $this
                ->quotes
                ->createQuoteOriginFromRequest($request, $quote);

            $quoteOriginCoordinates = $this
                ->googleApi
                ->getCoordinatesByAddress($quoteOrigin->getAddress());

            if ($quoteOriginCoordinates) {
                $quoteOrigin->update($quoteOriginCoordinates);
            }

            $quoteDestination = $this
                ->quotes
                ->createQuoteDestinationFromRequest($request, $quote);

            $quoteDestinationCoordinates = $this
                ->googleApi
                ->getCoordinatesByAddress($quoteDestination->getAddress());

            if ($quoteDestinationCoordinates) {
                $quoteDestination->update($quoteDestinationCoordinates);
            }

            $quoteVehicle = $this
                ->quotes
                ->createQuoteVehicleFromRequest($request, $quote);

            $quoteTransport = $this
                ->quotes
                ->createQuoteTransportFromRequest($request, $quote);

            activity()
                ->performedOn($quote)
                ->log('edited');

            DB::commit();

            return $quote;

        } catch (\Throwable $exception) {

            DB::rollBack();
            throw $exception;

        }
    }

    public function getQuoteFromRequest(GetQuoteRequest $request): ?Quote
    {
        return $this
            ->quotes
            ->findById($request->input('quote_id'));
    }

    public function deleteQuoteFromRequest(DeleteQuoteRequest $request): ?bool
    {
        return $this
            ->quotes
            ->deleteFromRequest($request);
    }

    public function restoreQuoteFromRequest(RestoreQuoteRequest $request): ?bool
    {
        return $this
            ->quotes
            ->restoreFromRequest($request);
    }

    public function emailQuoteFromRequest(EmailQuoteRequest $request): bool
    {
        $quote = $this
            ->quotes
            ->findById($request->input('quote_id'));

        $quote->email($request->input('email'));

        return true;
    }

    public function calculateQuotePriceWithDistanceFromRequest(CalculateQuotePriceRequest $request): array
    {
        $originZip = $request->input('origin_zip');
        $destinationZip = $request->input('destination_zip');

        $totalMiles = $this
            ->googleApi
            ->distanceBetweenTwoPoints($originZip, $destinationZip);

        $currentPricePerMile = $this
            ->shippers
            ->findById($request->input('shipper_id'))
            ->price_per_mile;

        return [
            'price' => $totalMiles * $currentPricePerMile,
            'distance' => $totalMiles
        ];
    }

    public function calculateQuotePriceFromRequest(CalculateQuotePriceRequest $request): float
    {
        $originZip = $request->input('origin_zip');
        $destinationZip = $request->input('destination_zip');

        $totalMiles = $this
            ->googleApi
            ->distanceBetweenTwoPoints($originZip, $destinationZip);

        $currentPricePerMile = $this
            ->shippers
            ->findById($request->input('shipper_id'))
            ->price_per_mile;

        return intval(ceil($totalMiles * $currentPricePerMile));
    }

    public function convertQuoteToOrder(Quote $quote): Quote
    {
        $quote->update([
            'status' => Quote::STATUS_APPROVED
        ]);

        if (!$quote->client->password) {

            $password = Str::random(11);
            $quote->client->update([
                'password' => Hash::make($password)
            ]);

            $credentials = new Credentials(
                $quote->client->email,
                $password
            );

            Mail::to($quote->client->email)
                ->send(new CredentialsTemplateMail(
                    $quote->shipper,
                    $credentials
                ));
        }

        return $quote;
    }

    /**
     * @param $request
     * @return int
     * @throws AuthenticationException
     */
    public function createQuoteDraft($request)
    {
        $user = auth()->guard()->user();

        if (!$shipper = $user->getShipper()) {
            throw new AuthenticationException();
        }

        DB::beginTransaction();
        try {

            $quote = $this->quoteDraft->createQuoteDraft($request, $shipper->id, $user->id);
            $quoteShipper = $this->quoteDraft->createQuoteShipperDraft($request, $quoteId = $quote->id);
            $quoteOrigin = $this->quoteDraft->createQuoteOriginDraft($request, $quoteId);
            $quoteDestination = $this->quoteDraft->createQuoteDestinationDraft($request, $quoteId);
            $quoteVehicles = $this->quoteDraft->createQuoteVehicleDraft($request, $quoteId);
            $quoteTransport = $this->quoteDraft->createQuoteTransportDraft($request, $quoteId);

            event(new OrderInitiated($user, $quote));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $quote->id;
    }

}
