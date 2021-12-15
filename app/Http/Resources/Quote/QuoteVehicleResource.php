<?php

namespace App\Http\Resources\Quote;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteVehicleResource extends JsonResource
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
            'year' => $this->year,
            'make' => $this->make,
            'model' => $this->model,
            'vin' => $this->vin,
            'is_running' => $this->is_running,
            'size' => $this->size,
            'size_name' => $this->size_name,
            'price' => $this->price,
            'vehicle_string' => $this->vehicle_string
        ];
    }
}
