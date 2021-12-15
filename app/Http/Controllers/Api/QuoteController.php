<?php

namespace App\Http\Controllers\Api;

use App\ApiService\TwilioService;
use App\Concerns\Controller\SendsEmptyResponse;
use App\Help\CollectionWrapper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\CalculateQuotePriceRequest;
use App\Http\Requests\Quote\ClientConvertQuoteToOrderRequest;
use App\Http\Requests\Quote\ConvertQuoteToOrderRequest;
use App\Http\Requests\Quote\CreateQuoteRequest;
use App\Http\Requests\Quote\DeleteQuoteRequest;
use App\Http\Requests\Quote\EmailQuoteRequest;
use App\Http\Requests\Quote\GetQuoteRequest;
use App\Http\Requests\Quote\RestoreQuoteRequest;
use App\Http\Requests\Quote\UpdateQuoteRequest;
use App\Http\Requests\Quote\PayQuoteRequest;
use App\Http\Resources\LoadResource;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use App\Models\Quote\QuoteTransport;
use App\Models\Quote\QuoteVehicle;
use App\Models\Quote\QuotePayment;
use App\Models\ZipCode;
use App\Repository\QuoteRepository;
use App\Service\CheckoutService;
use App\Service\QuoteManagementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class QuoteController extends Controller
{
    use SendsEmptyResponse;

    private QuoteManagementService $quoteManagement;
    private QuoteRepository $quotes;
    private TwilioService $twilio;
    private CheckoutService $checkout;

    public function __construct(
        QuoteManagementService $quoteManagement,
        QuoteRepository $quotes,
        TwilioService $twilio,
        CheckoutService $checkout
    )
    {
        $this->quoteManagement = $quoteManagement;
        $this->quotes = $quotes;
        $this->twilio = $twilio;
        $this->checkout = $checkout;
    }

    public function createOrder(CreateQuoteRequest $request)
    {
        $quote = $this
            ->quoteManagement
            ->createQuoteFromRequest($request, false);

        $to = '+1' . $quote->quoteShipper->phone;

        try {
            $this->twilio->sendMessage($to, $quote->toCreatedSmsText());
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
        }

        return response()
            ->json([
                'data' => new QuoteResource($quote)
            ]);
    }

    public function createQuote(CreateQuoteRequest $request)
    {
        $quote = $this
            ->quoteManagement
            ->createQuoteFromRequest($request);

        $quote->email($quote->quoteShipper->email);

        $to = '+1' . $quote->quoteShipper->phone;

        try {
            $this->twilio->sendMessage($to, $quote->toCreatedSmsText());
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());
        }

        return response()
            ->json([
                'data' => new QuoteResource($quote)
            ]);
    }

    public function payQuote(PayQuoteRequest $request)
    {
        $quote = $this
            ->checkout
            ->payQuote($request);

        if ($quote) {
            return response()
                ->json([
                    'quote' => $quote
                ]);
        } else {
            throw new \DomainException('Quote Payment Failed');
        }
    }

    public function updateQuote(UpdateQuoteRequest $request)
    {
        $quote = $this
            ->quoteManagement
            ->updateQuoteFromRequest($request);

        return response()
            ->json([
                'data' => new QuoteResource($quote)
            ]);
    }

    public function getQuote(GetQuoteRequest $request)
    {
        $quote = $this
            ->quoteManagement
            ->getQuoteFromRequest($request);

        if ($quote) {
            $quote->load([
               'client',
               'quoteShipper',
               'quoteOrigin',
               'quoteDestination',
               'quoteTransport',
               'quoteVehicle',
               'quotePayment',
               'activities' => function ($query) {
                    $query->orderBy('id', 'desc');
                },
               'activities.causer'
            ]);

            return response()
                ->json([
                    'data' => new QuoteResource($quote)
                ]);
        }

        return response()
            ->json([
                'data' => null
            ]);
    }

    public function deleteQuote(DeleteQuoteRequest $request): JsonResponse
    {
        $this
            ->quoteManagement
            ->deleteQuoteFromRequest($request);

        return $this->sendDeletedResponse();
    }

    public function restoreQuote(RestoreQuoteRequest $request): JsonResponse
    {
        $quote = $this->quotes->findById($request->input('quote_id'));

        $this
            ->quoteManagement
            ->restoreQuoteFromRequest($request);

        return response()
            ->json([
                'restored' => true,
                'type' => in_array($quote->deleted_with_status, array_keys(Quote::getOrderStatusesMap())) ? 'order' : 'quote'
            ]);
    }

    public function emailQuote(EmailQuoteRequest $request): JsonResponse
    {
        $this
            ->quoteManagement
            ->emailQuoteFromRequest($request);

        return $this->sendEmptyResponse();
    }

    public function getCarrierTypesData(): JsonResponse
    {
        return response()
            ->json([
                'data' => CollectionWrapper::toKeyValueMap(QuoteTransport::CARRIER_TYPES_MAP)
            ]);
    }

    public function getCarSizesData(): JsonResponse
    {
        return response()
            ->json([
                'data' => CollectionWrapper::toKeyValueMap(QuoteVehicle::VEHICLE_SIZE_MAP)
            ]);
    }

    public function getDeliveryAccuracyData(): JsonResponse
    {
        return response()
            ->json([
                'data' => CollectionWrapper::toKeyValueMap(QuoteTransport::DELIVERY_ACCURACY_MAP)
            ]);
    }

    public function getAvailableAccuracyData(): JsonResponse
    {
        return response()
            ->json([
                'data' => CollectionWrapper::toKeyValueMap(QuoteTransport::DELIVERY_ACCURACY_MAP)
            ]);
    }

    public function getStatesData(): JsonResponse
    {
        return response()
            ->json([
                'data' => CollectionWrapper::toKeyValueMap(ZipCode::STATE_MAP)
            ]);
    }

    public function getQuoteStatusesData(Request $request): JsonResponse
    {
        $orderStatuses = false;
        $status = $request->query('quote_status');

        if ($status) {
            if (in_array($status, array_keys(Quote::getOrderStatusesMap()))) {
                $orderStatuses = true;
            }
        }

        return $orderStatuses ?
            response()
                ->json([
                    'data' => CollectionWrapper::toKeyValueMap(Quote::getOrderStatusesMap())
                ]) :
            response()
                ->json([
                    'data' => CollectionWrapper::toKeyValueMap(Quote::getQuoteStatusesMap())
                ]);
    }

    public function getQuoteProgressStatusesData(Request $request): JsonResponse
    {
        return response()
            ->json([
                'data' => CollectionWrapper::toKeyValueMap(Quote::getProgressStatusesMap())
            ]);
    }

    public function calculateQuotePrice(CalculateQuotePriceRequest $request): JsonResponse
    {
        $priceWithDistance = $this
            ->quoteManagement
            ->calculateQuotePriceWithDistanceFromRequest($request);

        return response()
            ->json([
                'data' => [
                    'price' => $priceWithDistance['price'],
                    'distance' => $priceWithDistance['distance']
                ]
            ]);
    }

    public function convertQuoteToOrder(ConvertQuoteToOrderRequest $request)
    {
        $quote = $this
            ->quotes
            ->findById($request->input('quote_id'));

        if ($quote->isOrder()) return $this
            ->sendUpdatedResponse();

        if (auth()->user() && auth()->user()->isClientOf($request->getShipper())) {
            return response()
                ->json([
                    'redirect' => $quote->convertToOrderUrl($isClient = true)
                ]);
        }


        $quote = $this
            ->quoteManagement
            ->convertQuoteToOrder($quote);

        activity()
            ->performedOn($quote)
            ->log('converted to order');

        return $this
            ->sendUpdatedResponse();
    }
}
