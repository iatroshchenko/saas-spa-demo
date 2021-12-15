<?php

namespace App\Http\Resources\Load;

use Illuminate\Http\Resources\Json\JsonResource;

class LoadOriginResource extends JsonResource
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
            'name' => $this->name,
            'company' => $this->company,
            'type' => $this->type,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'city' => $this->city,
            'state' => $this->state,
            'state_name' => $this->state_name,
            'zip' => $this->zip,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'phone' => $this->phone,
            'phone_2' => $this->phone_2,
            'mobile' => $this->mobile,

            'phone_masked' => $this->phone_masked ? '+1' . $this->phone : null,
            'phone2_masked' => $this->phone2_masked ? '+1' . $this->phone2 : null,
            'mobile_masked' => $this->mobile_masked ? '+1' . $this->mobile : null,

            'email' => $this->email,
            'address_string' => $this->address_string
        ];
    }
}
