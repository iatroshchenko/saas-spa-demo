<?php

namespace App\Models;

use App\Concerns\Model\UsesPublicUuid;
use App\DTO\Payment\StripeCredentials;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shipper extends Model
{
    use HasFactory, UsesPublicUuid;

    const DEFAULT_PRICE_PER_MILE = 100;

    protected $fillable = [
        'owner_id',
        'name',
        'price_per_mile',
        'public_key',
        'secret_key',
        'test_mode',

        // business fields
        'logo',
        'business_name',
        'email',
        'phone',
        'address',
        'fax',
        'timezone'
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

        static::created(function ($model) {
            $model->createDefaultMailTemplates();
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function loads()
    {
        return $this->hasMany(Load::class);
    }

    public function createDefaultMailTemplates()
    {
        foreach (Shipper\ShipperMailTemplate::getDefaultTemplatesMap() as $mailable => $templateInfo) {
            Shipper\ShipperMailTemplate::create([
                'mailable' => $mailable,
                'html_template' => file_get_contents($templateInfo['path']),
                'name' => $templateInfo['name'],
                'shipper_id' => $this->id,
                'subject' => $templateInfo['subject'],
                'is_active' => true
            ]);
        }
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function contactGroups()
    {
        return $this->hasMany(ContactGroup::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function settings()
    {
        return $this->morphMany(Setting::class, 'entity');
    }

    public function hasStripeCredentials(): bool
    {
        $hasCredetnials = true;

        try {
            $this->getStripeCredentials();
        } catch (\Throwable $exception) {
            $hasCredetnials = false;
        }

        return $hasCredetnials;
    }

    public function getStripeCredentials(): StripeCredentials
    {
        return new StripeCredentials(
            $this->public_key,
            $this->secret_key
        );
    }

    public static function getLogosFolder(): string
    {
        return storage_path('app/public/company-logos/');
    }

    public function setCompanyLogo(string $name): string
    {
        $this->logo = $name;
        $this->save();
        return $name;
    }

    public function getCompanyLogoUrl(): ?string
    {
        if (!$this->logo) return false;
        return url('storage/company-logos/' . $this->logo);
    }
}
