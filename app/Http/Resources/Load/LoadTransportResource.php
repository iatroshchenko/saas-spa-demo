<?php

namespace App\Http\Resources\Load;

use Illuminate\Http\Resources\Json\JsonResource;

class LoadTransportResource extends JsonResource
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
            'available_date_formatted'=> $this->available_date->format('m-d-Y'),
            'delivery_date_formatted' => $this->delivery_date->format('m-d-Y'),
            'distance' => $this->distance,
            'price' => $this->price,
            'deposit' => $this->deposit,
            'carrier_type' => $this->carrier_type,
            'carrier_type_name' => $this->carrier_type_name,
            'available_accuracy' => $this->available_accuracy,
            'available_accuracy_name' => $this->available_accuracy_name,
            'delivery_accuracy' => $this->delivery_accuracy,
            'delivery_accuracy_name' => $this->delivery_accuracy_name,
            'carrier_pay_terms' => $this->carrier_pay_terms,
            'carrier_pay_terms_name' => $this->carrier_pay_terms_name,
            'customer_pay_terms' => $this->customer_pay_terms,
            'customer_pay_terms_name' => $this->customer_pay_terms_name,
            'carrier_pay' => $this->carrier_pay
        ];
    }
}
