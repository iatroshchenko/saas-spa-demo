<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'name' => $this->full_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role' => $this->role,
            'role_name' => $this->getRoleName(),
            'phone' => $this->phone,
            'status' => $this->status,
            'status_name' => $this->getStatusName(),
            'ask_password_change_next_login' => $this->ask_password_change_next_login,

            'city' => $this->clientMeta ? $this->clientMeta->city : null,
            'state' => $this->clientMeta ? $this->clientMeta->state : null,
            'zip' => $this->clientMeta ? $this->clientMeta->zip : null,

            'address_1' => $this->clientMeta ? $this->clientMeta->address_1 : null,
            'address_2' => $this->clientMeta ? $this->clientMeta->address_2 : null,
            'type' => $this->clientMeta ? $this->clientMeta->type : null,
            'company' => $this->clientMeta ? $this->clientMeta->company : null,
            'mobile' => $this->clientMeta ? $this->clientMeta->mobile : null,
            'fax' => $this->clientMeta ? $this->clientMeta->fax : null,
            'notes_from_shipper' => $this->clientMeta ? $this->clientMeta->notes_from_shipper : null,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
