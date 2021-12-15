<?php

namespace App\Http\Resources;

use App\Help\SignatureHelper;
use App\Repository\SettingRepository;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SettingsResource
 * @package App\Http\Resources
 */
class ShipperSettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'key' => $resource->key,
            'value' => $resource->value
        ];
    }
}
