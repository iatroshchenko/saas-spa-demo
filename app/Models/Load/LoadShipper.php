<?php

namespace App\Models\Load;

use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadShipper extends Model
{
    use HasFactory;

    protected $fillable = [
        'load_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'type',
        'company',
        'description',
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

    public function getAddressStringAttribute(): ?string
    {
        if (!$this->city && !$this->state && !$this->zip) return null;

        $addressString = '';

        if ($this->city) {
            $addressString .= $this->city;
        }

        if ($this->state) {
            if ($this->city) {
                $addressString .= ', ';
            }
            $addressString .= $this->state;
        }

        if ($this->zip) {
            $addressString .= ' ' . $this->zip;
        }

        return $addressString;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getStateNameAttribute()
    {
        return $this->state ? ZipCode::STATE_MAP[$this->state] : null;
    }

    public function getTypeNameAttribute()
    {
        return self::TYPES_MAP[$this->type];
    }

    const TYPE_RESIDENCE = 0;
    const TYPE_BUSINESS = 1;

    const TYPES_MAP = [
        self::TYPE_RESIDENCE => 'Residence',
        self::TYPE_BUSINESS => 'Business'
    ];
}
