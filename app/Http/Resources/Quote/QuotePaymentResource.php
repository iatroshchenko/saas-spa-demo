<?php

namespace App\Http\Resources\Quote;

use Illuminate\Http\Resources\Json\JsonResource;

class QuotePaymentResource extends JsonResource
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
            'quote_id' => $this->quote_id,
            'shipper_id' => $this->shipper_id,
            'receipt_url' => $this->receipt_url,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
