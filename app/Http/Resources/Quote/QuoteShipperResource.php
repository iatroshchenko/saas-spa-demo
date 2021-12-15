<?php

namespace App\Http\Resources\Quote;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteShipperResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'type' => $this->type,
            'type_name' => $this->type_name,
            'company' => $this->company,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'zip' => $this->zip,
            'city' => $this->city,
            'state' => $this->state,
            'state_name' => $this->state_name,
            'phone_2' => $this->phone_2,
            'mobile' => $this->mobile,
            'fax' => $this->fax,

            'phone_masked' => $this->phone ? '+1' . $this->phone : null,
            'phone2_masked' => $this->phone2 ? '+1' . $this->phone2 : null,
            'mobile_masked' => $this->mobile ? '+1' . $this->mobile : null,

            'notes_from_shipper' => $this->notes_from_shipper
        ];
    }
}
