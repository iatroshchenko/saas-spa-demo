<?php

namespace App\Models\Load;

use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadOrigin extends Model
{
    use HasFactory;

    protected $casts = [
        'lat' => 'double',
        'lng' => 'double'
    ];

    protected $fillable = [
        'load_id',
        'name',
        'company',
        'type',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'phone',
        'phone_2',
        'mobile',
        'email',
        'lat',
        'lng'
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

    public function getAddress(): string
    {
        return $this->city . ' ' . $this->state . ' ' . $this->zip;
    }

    public function getStateNameAttribute()
    {
        return ZipCode::STATE_MAP[$this->state];
    }
}
