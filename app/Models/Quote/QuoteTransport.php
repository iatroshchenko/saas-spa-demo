<?php

namespace App\Models\Quote;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteTransport extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'carrier_type',
        'available_date',
        'delivery_date',
        'delivery_accuracy',
        'price',
        'deposit',
        'distance'
    ];

    protected $dates = [
        'available_date',
        'delivery_date',
    ];

    protected $dateFormat = 'Y/m/d';

    const CARRIER_TYPE_OPENED = 1;
    const CARRIER_TYPE_ENCLOSED = 2;

    const CARRIER_TYPES_MAP = [
        self::CARRIER_TYPE_OPENED => 'Opened',
        self::CARRIER_TYPE_ENCLOSED => 'Enclosed'
    ];

    const DELIVERY_ACCURACY_AROUND = 1;
    const DELIVERY_ACCURACY_BEFORE = 2;
    const DELIVERY_ACCURACY_ON = 3;
    const DELIVERY_ACCURACY_AFTER = 4;

    const DELIVERY_ACCURACY_MAP = [
        self::DELIVERY_ACCURACY_AROUND => 'Around',
        self::DELIVERY_ACCURACY_BEFORE => 'Before',
        self::DELIVERY_ACCURACY_ON => 'On',
        self::DELIVERY_ACCURACY_AFTER => 'After'
    ];

    public function getCarrierTypeNameAttribute()
    {
        return self::CARRIER_TYPES_MAP[$this->carrier_type];
    }

    public function getDeliveryAccuracyNameAttribute()
    {
        return self::DELIVERY_ACCURACY_MAP[$this->delivery_accuracy];
    }
}
