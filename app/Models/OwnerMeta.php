<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class OwnerMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'address',
        'city',
        'state',
        'zip'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
