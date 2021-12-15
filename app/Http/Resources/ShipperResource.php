<?php

namespace App\Http\Resources;

use App\Models\Shipper;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->getPublicKey(),
            'name' => $this->name,
            'price_per_mile' => $this->price_per_mile,
        ];

        if (auth()->user() && auth()->user()->owns(Shipper::findByPublicId($this->getPublicKey()))) {
            $data['public_key'] = $this->public_key;
            $data['secret_key'] = $this->secret_key;
            $data['test_mode'] = $this->test_mode;
            $data['business_name'] = $this->business_name;
            $data['email'] = $this->email;
            $data['address'] = $this->address;
            $data['phone'] = $this->phone ? '+1' . $this->phone : null;
            $data['fax'] = $this->fax ? '+1' . $this->fax : null;
            $data['timezone'] = $this->timezone;
            $data['logo'] = $this->getCompanyLogoUrl();
        }

        return $data;
    }
}
