<?php


namespace App\Repository;


use App\Http\Requests\Quote\CreateQuoteRequest;
use App\Http\Requests\Quote\DeleteQuoteRequest;
use App\Http\Requests\Quote\RestoreQuoteRequest;
use App\Models\Quote;
use App\Models\Quote\QuoteShipper;
use App\Models\Shipper;
use Illuminate\Support\Collection;

class QuoteRepository
{
    public function findById($id): ?Quote
    {
        return Quote::find($id);
    }

    public function getOrdersForShipper(Shipper $shipper): Collection
    {
        $quotes = $shipper->quotes();

        $orderStatuses = array_keys(Quote::getOrderStatusesMap());

        $quotes->where(function ($query) use ($orderStatuses) {
            $query->whereIn('status', $orderStatuses)
                ->orWhereIn('deleted_with_status', $orderStatuses);
        });

        $currentUser = auth()->user();
        if ($currentUser->isClient()) {
            $quotes->where('client_id', $currentUser->id);
        }

        $quotes->orderByDesc('id');

        return $quotes->get();
    }

    public function getQuotesForShipper(Shipper $shipper): Collection
    {
        $quotes = $shipper->quotes();

        $quoteStatuses = array_keys(Quote::getQuoteStatusesMapWithApproved());

        $quotes->where(function ($query) use ($quoteStatuses) {
            $query->whereIn('status', $quoteStatuses)
                ->orWhereIn('deleted_with_status', $quoteStatuses);
        });

        $currentUser = auth()->user();
        if ($currentUser->isClient()) {
            $quotes->where('client_id', $currentUser->id);
        }

        $quotes->orderByDesc('id');

        return $quotes->get();
    }

    public function createFromRequest(CreateQuoteRequest $request, bool $isQuote = true): Quote
    {
        $fillable = (new Quote())
            ->getFillable();

        $data = $request->only($fillable);
        $data['shipper_id'] = $request->getShipper()->id;
        $data['client_id'] = $request->getUser('client_id')->id;
        $data['status'] = $isQuote ? Quote::STATUS_QUOTE : Quote::STATUS_APPROVED;

        return $this
            ->createFromArray($data);
    }

    public function createFromArray(array $data): Quote
    {
        return Quote::create($data);
    }

    public function deleteFromRequest(DeleteQuoteRequest $request): ?bool
    {
        return $this->deleteById($request->input('quote_id'));
    }

    public function restoreFromRequest(RestoreQuoteRequest $request): ?bool
    {
        return $this
            ->restoreById($request->input('quote_id'));
    }

    public function deleteById(string $id): ?bool
    {
        $quote = $this->findById($id);
        if ($quote) {
            $quote->update([
                'status' => Quote::STATUS_DELETED,
                'deleted_with_status' => $quote->status
            ]);

            activity()
                ->performedOn($quote)
                ->log('deleted');

            return true;
        }
        return false;
    }

    public function restoreById(string $id): ?bool
    {
        $quote = $this->findById($id);

        if ($quote && !is_null($quote->deleted_with_status)) {
            $quote->update([
                'status' => $quote->deleted_with_status,
                'deleted_with_status' => null
            ]);

            activity()
                ->performedOn($quote)
                ->log('restored');

            return true;
        }
        return false;
    }

    public function createQuoteShipperFromRequest(CreateQuoteRequest $request, Quote $quote): Quote\QuoteShipper
    {
        $fillable = (new QuoteShipper())->getFillable();

        $data = $request->only($fillable);
        $data['quote_id'] = $quote->id;

        return $this->createQuoteShipperFromArray($data);
    }

    public function createQuoteShipperFromArray(array $data): Quote\QuoteShipper
    {
        return Quote\QuoteShipper::create($data);
    }

    public function createQuoteOriginFromRequest(CreateQuoteRequest $request, Quote $quote): Quote\QuoteOrigin
    {
        $data = [
            'quote_id' => $quote->id,
            'city' => $request->input('quote_origin_city'),
            'state' => $request->input('quote_origin_state'),
            'zip' => $request->input('quote_origin_zip'),
        ];

        return $this->createQuoteOriginFromArray($data);
    }

    public function createQuoteOriginFromArray(array $data): Quote\QuoteOrigin
    {
        return Quote\QuoteOrigin::create($data);
    }

    /* Quote Destination */
    public function createQuoteDestinationFromRequest(CreateQuoteRequest $request, Quote $quote): Quote\QuoteDestination
    {
        $data = [
            'quote_id' => $quote->id,
            'city' => $request->input('quote_destination_city'),
            'state' => $request->input('quote_destination_state'),
            'zip' => $request->input('quote_destination_zip'),
        ];

        return $this->createQuoteDestinationFromArray($data);
    }

    public function createQuoteDestinationFromArray(array $data): Quote\QuoteDestination
    {
        return Quote\QuoteDestination::create($data);
    }
    /* Quote Destination */

    /* Quote Vehicle */
    public function createQuoteVehicleFromRequest(CreateQuoteRequest $request, Quote $quote): Quote\QuoteVehicle
    {
        $vehicle = [
            'year' => $request->input('quote_vehicle_year'),
            'make' => $request->input('quote_vehicle_make'),
            'model' => $request->input('quote_vehicle_model'),
            'vin' => $request->input('quote_vehicle_vin'),
            'size' => $request->input('quote_vehicle_size'),
            'is_running' => $request->input('quote_vehicle_is_running'),
        ];

        $vehicle['quote_id'] = $quote->id;
        return $this->createQuoteVehicleFromArray($vehicle);
    }

    public function createQuoteVehicleFromArray(array $data): Quote\QuoteVehicle
    {
        return Quote\QuoteVehicle::create($data);
    }
    /* Quote Vehicle */

    /* Quote Transport  */
    public function createQuoteTransportFromRequest(CreateQuoteRequest $request, Quote $quote): Quote\QuoteTransport
    {
        $fillable = (new Quote\QuoteTransport())->getFillable();
        $data = $request->only($fillable);
        $data['quote_id'] = $quote->id;
        return $this->createQuoteTransportFromArray($data);
    }

    public function createQuoteTransportFromArray(array $data): Quote\QuoteTransport
    {
        return Quote\QuoteTransport::create($data);
    }
    /* Quote Transport */
}
