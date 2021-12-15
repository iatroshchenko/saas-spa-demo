<?php

namespace App\Models\Quote;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'shipper_id',
        'receipt_url',
        'status',
        'customer_id',
        'payment_method_id',
        'created_at',
    ];
}
