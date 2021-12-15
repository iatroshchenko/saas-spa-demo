<?php

namespace App\Models\Load;

use App\Models\Quote\QuoteVehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'load_id',
        'year',
        'make',
        'model',
        'vin',
        'is_running',
        'size',
        'price',
        'state',
        'color',
        'plate_number',
        'lot_number',
        'p_o_number',
        'notes'
    ];

    public function getSizeNameAttribute()
    {
        return QuoteVehicle::VEHICLE_SIZE_MAP[$this->size];
    }
}
