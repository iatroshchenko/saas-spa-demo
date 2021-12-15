<?php

namespace App\Models\Quote;

use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteOrigin extends Model
{
    use HasFactory;

    protected $casts = [
        'lat' => 'double',
        'lng' => 'double'
    ];

    protected $fillable = [
        'quote_id',
        'city',
        'state',
        'zip',
        'lat',
        'lng'
    ];

    public function getAddressStringAttribute()
    {
        return $this->city . ', ' . $this->state . ' ' . $this->zip;
    }

    public function getAddress(): string
    {
        return $this->city . ' ' . $this->state . ' ' . $this->zip;
    }

    public function getStateNameAttribute()
    {
        return ZipCode::STATE_MAP[$this->state] ?? '';
    }
}
