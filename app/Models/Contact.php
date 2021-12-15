<?php

namespace App\Models;

use App\Concerns\Model\UsesPublicUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    use HasFactory, UsesPublicUuid;

    protected $fillable = [
        'is_primary',
        'contact_group_id',
        'shipper_id',
        'first_name',
        'last_name',
        'phone',
        'email'
    ];

    /**
     * @return void
     */
    public static function booted()
    {
        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function contactGroup()
    {
        return $this->belongsTo(ContactGroup::class);
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }
}
