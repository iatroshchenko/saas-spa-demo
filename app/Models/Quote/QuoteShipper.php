<?php

namespace App\Models\Quote;

use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteShipper extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'type',
        'company',
        'address_1',
        'address_2',
        'zip',
        'city',
        'state',
        'phone_2',
        'mobile',
        'fax',
        'notes_from_shipper'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getStateNameAttribute()
    {
        return $this->state ? ZipCode::STATE_MAP[$this->state] : null;
    }

    const TYPE_RESIDENCE = 0;
    const TYPE_BUSINESS = 1;

    const TYPES_MAP = [
        self::TYPE_RESIDENCE => 'Residence',
        self::TYPE_BUSINESS => 'Business'
    ];

    public function getTypeNameAttribute()
    {
        return self::TYPES_MAP[$this->type];
    }

}
