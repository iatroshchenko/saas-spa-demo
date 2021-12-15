<?php


namespace App\Repository;


use App\Models\Shipper;
use App\Models\Shipper\ShipperMailTemplate;
use Illuminate\Support\Collection;

class ShipperMailTemplateRepository
{
    public function getMailTemplatesForShipper(Shipper $shipper): Collection
    {
        return ShipperMailTemplate::where('shipper_id', $shipper->id)
            ->orderBy('is_active', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get();
    }
}
