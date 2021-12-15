<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactGroupResource extends JsonResource
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
            'id' => $this->getPublicKey(),
            'name' => $this->name,
            'is_contact' => false,
            'contacts' => ContactResource::collection($this->whenLoaded('contacts')),
            'contacts_count' => $this->contacts_count
        ];
    }
}
