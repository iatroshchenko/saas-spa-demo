<?php

namespace App\Models;

use App\Mail\LoadEmail;
use App\Models\Load\LoadDestination;
use App\Models\Load\LoadOrigin;
use App\Models\Load\LoadShipper;
use App\Models\Load\LoadTransport;
use App\Models\Load\LoadVehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Load extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;

    const STATUS_NEW_LOAD = 0;
    const STATUS_COMPLETED_LOAD = 1;

    const STATUS_MAP = [
        self::STATUS_NEW_LOAD => 'New',
        self::STATUS_COMPLETED_LOAD => 'Completed'
    ];

    protected $fillable = [
        'shipper_id',
        'client_id',
        'driver_id',
        'status',
        'custom_load_number',
        'referrer'
    ];

    public function getStatusNameAttribute()
    {
        return self::STATUS_MAP[$this->status];
    }

    public function getAttachmentsLinks(): array
    {
        $attachments = $this->getMedia('attachments');

        $attachmentsLinks = [];

        foreach ($attachments as $item) {
            $attachmentsLinks[] = [
                'key' => $item->name . '.' . $item->extension,
                'value' => $item->getUrl(),
                'format' => $item->extension
            ];
        }

        return $attachmentsLinks;
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->status = self::STATUS_NEW_LOAD;
        });
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class, 'shipper_id', 'id');
    }

    public function loadShipper()
    {
        return $this->hasOne(LoadShipper::class);
    }

    public function loadOrigin()
    {
        return $this->hasOne(LoadOrigin::class);
    }

    public function loadDestination()
    {
        return $this->hasOne(LoadDestination::class);
    }

    public function loadVehicles()
    {
        return $this->hasMany(LoadVehicle::class);
    }

    public function loadTransport()
    {
        return $this->hasOne(LoadTransport::class);
    }

    public function email(string $email)
    {
        Mail::to($email)
            ->send(new LoadEmail($this));
    }
}
