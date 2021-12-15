<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'id' => $this->uuid,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'name' => $this->first_name . ' ' . $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'client' => new UserResource($this->whenLoaded('client')),
            'is_primary' => $this->is_primary,
            'is_contact' => true,
            'contact_group_id' => $this->contactGroup ? $this->contactGroup->uuid : null
        ];
    }
}
