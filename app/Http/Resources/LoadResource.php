<?php

namespace App\Http\Resources;

use App\Help\CollectionWrapper;
use App\Http\Resources\Load\LoadDestinationResource;
use App\Http\Resources\Load\LoadOriginResource;
use App\Http\Resources\Load\LoadShipperResource;
use App\Http\Resources\Load\LoadTransportResource;
use App\Http\Resources\Load\LoadVehicleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LoadResource extends JsonResource
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
            'attachments' => $this->getAttachmentsLinks(),
            'custom_load_number' => $this->custom_load_number,
            'referrer' => $this->referrer,
            'status' => $this->status,
            'status_name' => $this->status_name,
            'client' => new ClientResource($this->whenLoaded('client')),
            'driver' => new UserResource($this->whenLoaded('driver')),
            'shipper' => new LoadShipperResource($this->whenLoaded('loadShipper')),
            'origin' => new LoadOriginResource($this->whenLoaded('loadOrigin')),
            'destination' => new LoadDestinationResource($this->whenLoaded('loadDestination')),
            'transport' => new LoadTransportResource($this->whenLoaded('loadTransport')),
            'vehicles' => LoadVehicleResource::collection($this->whenLoaded('loadVehicles')),
            'activities' => ActivityResource::collection($this->whenLoaded('activities'))
        ];
    }
}
