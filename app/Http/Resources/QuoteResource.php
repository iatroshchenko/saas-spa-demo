<?php

namespace App\Http\Resources;

use App\Http\Resources\Quote\QuoteDestinationResource;
use App\Http\Resources\Quote\QuoteOriginResource;
use App\Http\Resources\Quote\QuoteShipperResource;
use App\Http\Resources\Quote\QuoteTransportResource;
use App\Http\Resources\Quote\QuoteVehicleResource;
use App\Http\Resources\Quote\QuotePaymentResource;

use App\Models\Quote;
use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'status_name' => $this->status_name,
            'client' => new ClientResource($this->whenLoaded('client')),
            'shipper' => new QuoteShipperResource($this->whenLoaded('quoteShipper')),
            'origin' => new QuoteOriginResource($this->whenLoaded('quoteOrigin')),
            'destination' => new QuoteDestinationResource($this->whenLoaded('quoteDestination')),
            'transport' => new QuoteTransportResource($this->whenLoaded('quoteTransport')),
            'vehicle' => new QuoteVehicleResource($this->whenLoaded('quoteVehicle')),
            'payment' => new QuotePaymentResource($this->whenLoaded('quotePayment')),
            'activities' => ActivityResource::collection($this->whenLoaded('activities')),
            'diff_for_humans' => $this->diff_for_humans,
            'converts_to_order' => !in_array($this->status, array_keys(Quote::getOrderStatusesMapWithDeleted())),
            'sends_quote_email' => $this->isQuote(),
            'sends_order_email' => $this->isOrder(),
            'entity_type' => $this->isQuote() ? 'quote' : 'order',
            'is_deleted' => $this->status === Quote::STATUS_DELETED,
            'is_not_deleted' => $this->status !== Quote::STATUS_DELETED,
            'paid' => $this->isPaid()
        ];
    }
}
