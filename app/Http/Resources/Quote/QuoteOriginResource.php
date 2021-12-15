<?php

namespace App\Http\Resources\Quote;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteOriginResource extends JsonResource
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
            'city' => $this->city,
            'state' => $this->state,
            'state_name' => $this->state_name,
            'zip' => $this->zip,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'address_string' => $this->address_string
        ];
    }
}
