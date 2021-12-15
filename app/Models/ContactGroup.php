<?php

namespace App\Models;

use App\Concerns\Model\UsesPublicUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactGroup extends Model
{
    use HasFactory, UsesPublicUuid;

    protected $fillable = [
        'name',
        'shipper_id'
    ];

    /**
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function primaryContact()
    {
        return $this->hasMany(Contact::class)
            ->where('is_primary', true);
    }
}
