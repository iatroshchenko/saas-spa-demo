<?php

namespace App\Http\Resources;

use App\Models\Shipper;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'avatar' => $this->getAvatarUrl(),
            'name' => $this->full_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role' => $this->role,
            'role_name' => $this->getRoleName(),
            'phone' => $this->phone,
            'address' => $this->ownerMeta ? $this->ownerMeta->address : null,
            'city' => $this->ownerMeta ? $this->ownerMeta->city : null,
            'state' => $this->ownerMeta ? $this->ownerMeta->state : null,
            'zip' => $this->ownerMeta ? $this->ownerMeta->zip : null,
            'ask_password_change_next_login' => $this->ask_password_change_next_login,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'controlledShippers' => auth()->user()->isSuperadmin() ? ShipperResource::collection(Shipper::all()) : ShipperResource::collection($this->whenLoaded('controlledShippers')),
            'shippers' => ShipperResource::collection($this->whenLoaded('shippers')),
            'status' => $this->status,
            'status_name' => $this->getStatusName(),
            'sidebar' => $this->getSidebarItems()
        ];
    }
}
