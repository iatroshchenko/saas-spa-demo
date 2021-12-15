<?php

namespace App\Repository;

use App\Exceptions\Helpers\DatabaseException;
use App\Models\Quote;
use Illuminate\Support\Facades\Request;

/**
 * Class QuoteDraftRepository
 * @package App\Repository
 */
class QuoteDraftRepository extends QuoteRepository
{
    /**
     * @param $request
     * @param string $shipperId
     * @param string $userId
     * @return Quote
     * @throws DatabaseException
     */
    public function createQuoteDraft($request, string $shipperId, string $userId)
    {
        $quote = $this->createFromArray([
            'client_id' => $userId,
            'shipper_id' => $shipperId,
            'status' => Quote::STATUS_QUOTE,
        ]);

        if (!$quote) {
            throw DatabaseException::operationFailed('Quote creation failed');
        }

        return $quote;
    }

    /**
     * @param Request $request
     * @param int $quoteId
     * @return Quote\QuoteShipper
     * @throws DatabaseException
     */
    public function createQuoteShipperDraft($request, int $quoteId)
    {
        $quoteShipperFillable = (new Quote\QuoteShipper())->getFillable();

        $data = $request->only($quoteShipperFillable) + [
                'quote_id' => $quoteId,
                'type' => Quote\QuoteShipper::TYPE_BUSINESS,
                'company' => ''
            ];

        $quoteShipper = $this->createQuoteShipperFromArray($data);

        if (!$quoteShipper) {
            throw DatabaseException::operationFailed('Quote shipper creation failed');
        }

        return $quoteShipper;
    }

    /**
     * @param Request $request
     * @param int $quoteId
     * @return Quote\QuoteOrigin
     * @throws DatabaseException
     */
    public function createQuoteOriginDraft($request, int $quoteId)
    {
        $quoteOrigin = $this->createQuoteOriginFromArray([
            'quote_id' => $quoteId,
            'zip' => $request->post('origin'),
            'state' => '',
            'city' => ''
        ]);

        if (!$quoteOrigin) {
            throw DatabaseException::operationFailed('Quote origin creation failed');
        }

        return $quoteOrigin;
    }

    /**
     * @param Request $request
     * @param int $quoteId
     * @return Quote\QuoteDestination
     * @throws DatabaseException
     */
    public function createQuoteDestinationDraft($request, int $quoteId)
    {
        $quoteDestination = $this->createQuoteDestinationFromArray([
            'quote_id' => $quoteId,
            'zip' => $request->post('destination'),
            'state' => '',
            'city' => ''
        ]);

        if (!$quoteDestination) {
            throw DatabaseException::operationFailed('Quote destination creation failed');
        }

        return $quoteDestination;
    }

    /**
     * @param $request
     * @param int $quoteId
     * @return Quote\QuoteVehicle
     * @throws DatabaseException
     */
    public function createQuoteVehicleDraft($request, int $quoteId)
    {
        $quoteVehicles = $this->createQuoteVehicleFromArray([
            'quote_id' => $quoteId,
            'make' => $request->post('vehicle_make'),
            'model' => $request->post('vehicle_model'),
            'year' => $request->post('vehicle_year'),
            'is_running' => !$request->post('not_operable'),
            'size' => Quote\QuoteVehicle::VEHICLE_SIZE_OTHER,
            'price' => 0.01
        ]);

        if (!$quoteVehicles) {
            throw DatabaseException::operationFailed('Quote vehicle creation failed');
        }

        return $quoteVehicles;
    }

    /**
     * @param $request
     * @param int $quoteId
     * @return Quote\QuoteTransport
     * @throws DatabaseException
     */
    public function createQuoteTransportDraft($request, int $quoteId)
    {
        $quoteTransport = $this->createQuoteTransportFromArray([
                'quote_id' => $quoteId,
                'available_date' => $pickupDate = $request->post('pickup_date'),
                'delivery_date' => $pickupDate,
                'price' => $request->post('total'),
                'carrier_type' => Quote\QuoteTransport::CARRIER_TYPE_OPENED,
                'delivery_accuracy' => Quote\QuoteTransport::DELIVERY_ACCURACY_AFTER,
                'distance' => 0.01
            ]);

        if (!$quoteTransport) {
            throw DatabaseException::operationFailed('Quote transport creation failed');
        }

        return $quoteTransport;
    }
}
