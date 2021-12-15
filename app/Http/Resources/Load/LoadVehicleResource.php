<?php

namespace App\Http\Resources\Load;

use Illuminate\Http\Resources\Json\JsonResource;

class LoadVehicleResource extends JsonResource
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
            'price' => $this->price,
            'size_name' => $this->size_name,
            'state' => $this->state,
            'color' => $this->color,
            'plate_number' => $this->plate_number,
            'lot_number' => $this->lot_number,
            'p_o_number' => $this->p_o_number,
            'notes' => $this->notes
        ];
    }
}
