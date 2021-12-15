<?php

namespace App\Http\Resources\Quote;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteTransportResource extends JsonResource
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
            'available_date'=> $this->available_date->format('Y/m/d'),
            'delivery_date' => $this->delivery_date->format('Y/m/d'),
            'price' => $this->price,
            'deposit' => $this->deposit,
            'distance' => $this->distance,
            'carrier_type' => $this->carrier_type,
            'carrier_type_name' => $this->carrier_type_name,
            'delivery_accuracy' => $this->delivery_accuracy,
            'delivery_accuracy_name' => $this->delivery_accuracy_name,
            'available_date_for_humans' => $this->available_date->format('M d, Y')
        ];
    }
}
