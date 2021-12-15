<?php

namespace App\Http\Resources;

use App\Http\Resources\Activity\CauserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'when' => $this->created_at->format('m/d/Y h:i'),
            'causer' => new CauserResource($this->whenLoaded('causer')),
            'description' => $this->description
        ];
    }
}
