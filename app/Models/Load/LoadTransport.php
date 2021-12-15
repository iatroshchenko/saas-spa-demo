<?php

namespace App\Models\Load;

use App\Models\Quote\QuoteTransport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadTransport extends Model
{
    use HasFactory;

    const CUSTOMER_PAY_TERM_NET_15 = 1;
    const CUSTOMER_PAY_TERM_NET_20 = 2;
    const CUSTOMER_PAY_TERM_NET_30 = 3;
    const CUSTOMER_PAY_TERM_NET_60 = 4;
    const CUSTOMER_PAY_TERM_NET_90 = 5;

    const CUSTOMER_PAY_TERMS_MAP = [
        self::CUSTOMER_PAY_TERM_NET_15 => 'Net 15',
        self::CUSTOMER_PAY_TERM_NET_20 => 'Net 20',
        self::CUSTOMER_PAY_TERM_NET_30 => 'Net 30',
        self::CUSTOMER_PAY_TERM_NET_60 => 'Net 60',
        self::CUSTOMER_PAY_TERM_NET_90 => 'Net 90'
    ];

    const CARRIER_PAY_TERM_NET_15 = 2;
    const CARRIER_PAY_TERM_NET_20 = 3;
    const CARRIER_PAY_TERM_NET_30 = 4;
    const CARRIER_PAY_TERM_NET_60 = 5;
    const CARRIER_PAY_TERM_NET_90 = 6;
    const CARRIER_PAY_TERM_COD = 1;

    const CARRIER_PAY_TERMS_MAP = [
        self::CARRIER_PAY_TERM_COD => 'COD',
        self::CARRIER_PAY_TERM_NET_15 => 'Net 15',
        self::CARRIER_PAY_TERM_NET_20 => 'Net 20',
        self::CARRIER_PAY_TERM_NET_30 => 'Net 30',
        self::CARRIER_PAY_TERM_NET_60 => 'Net 60',
        self::CARRIER_PAY_TERM_NET_90 => 'Net 90'
    ];

    protected $fillable = [
        'load_id',
        'carrier_type',
        'available_date',
        'available_accuracy',
        'delivery_date',
        'delivery_accuracy',
        'distance',
        'price',
        'deposit',
        'customer_pay_terms',
        'carrier_pay_terms',
        'carrier_pay'
    ];

    protected $dates = [
        'available_date',
        'delivery_date',
    ];

    protected $dateFormat = 'Y/m/d';

    public function getCarrierPayTermsNameAttribute()
    {
        return $this->carrier_pay_terms ?
            self::CARRIER_PAY_TERMS_MAP[$this->carrier_pay_terms] :
            null;
    }

    public function getCustomerPayTermsNameAttribute()
    {
        return $this->customer_pay_terms ?
            self::CUSTOMER_PAY_TERMS_MAP[$this->customer_pay_terms] :
            null;
    }

    public function getCarrierTypeNameAttribute()
    {
        return QuoteTransport::CARRIER_TYPES_MAP[$this->carrier_type];
    }

    public function getDeliveryAccuracyNameAttribute()
    {
        return QuoteTransport::DELIVERY_ACCURACY_MAP[$this->delivery_accuracy];
    }

    public function getAvailableAccuracyNameAttribute()
    {
        return QuoteTransport::DELIVERY_ACCURACY_MAP[$this->available_accuracy];
    }

}
