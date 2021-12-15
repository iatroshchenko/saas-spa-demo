<?php

namespace App\Models;

use App\Concerns\Model\UsesPublicUuid;
use App\Mail\UserEmailVerificationNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia, UsesPublicUuid, LogsActivity;

    const ROLE_SUPERADMIN = 1;
    const ROLE_BUSINESS = 2;
    const ROLE_ADMIN = 3;
    const ROLE_MANAGER = 4;
    const ROLE_DRIVER = 5;
    const ROLE_DISPATCHER = 6;
    const ROLE_CLIENT = 7;

    const ROLE_MAP = [
        self::ROLE_SUPERADMIN => 'Superadmin',
        self::ROLE_BUSINESS => 'Business Owner',
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_MANAGER => 'Manager',
        self::ROLE_DRIVER => 'Driver',
        self::ROLE_DISPATCHER => 'Dispatcher',
        self::ROLE_CLIENT => 'Client'
    ];

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const STATUS_MAP = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
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

    public function getRoleAttribute($value): int
    {
        return intval($value);
    }

    public function getRoleName(): string
    {
        return self::ROLE_MAP[$this->role];
    }

    public function getRoleNameAttribute(): string
    {
        return self::ROLE_MAP[$this->role];
    }

    public function getStatusName(): string
    {
        return self::STATUS_MAP[$this->status];
    }

    public function getLabelAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name . ', ' . $this->email;
    }

    protected $fillable = [
        'email',
        'password',
        'role',
        'first_name',
        'last_name',
        'phone',
        'ask_password_change_next_login',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'ask_password_change_next_login' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function settings()
    {
        return $this->morphMany(Setting::class, 'entity');
    }

    public function shippers()
    {
        return $this->belongsToMany(Shipper::class);
    }

    public function controlledShippers()
    {
        return $this->hasMany(Shipper::class, 'owner_id', 'id');
    }

    public function ownerMeta()
    {
        return $this->hasOne(OwnerMeta::class, 'owner_id');
    }

    public function clientMeta()
    {
        return $this->hasOne(ClientMeta::class, 'client_id');
    }

    public function owns(Shipper $shipper): bool
    {
        return $this->controlledShippers()
            ->where('id', $shipper->id)
            ->exists();
    }

    public function ownsQuote(Quote $quote): bool
    {
        return $quote->client->id === $this->id;
    }

    public function ownsLoad(Load $load): bool
    {
        return $load->client_id === $this->id;
    }

    public function drivesLoad(Load $load): bool
    {
        return $load->driver_id === $this->id;
    }

    public function isAdminFor(Shipper $shipper): bool
    {
        return $this->shippers()
            ->where('shippers.id', $shipper->id)
            ->exists() && $this->isAdmin();
    }

    public function isManagerFor(Shipper $shipper): bool
    {
        return $this->shippers()
                ->where('shippers.id', $shipper->id)
                ->exists() && $this->isManager();
    }

    public function isDriverFor(Shipper $shipper): bool
    {
        return $this->shippers()
            ->where('shippers.id', $shipper->id)
            ->exists() && $this->isDriver();
    }

    public function isDispatcherFor(Shipper $shipper): bool
    {
        return $this->shippers()
            ->where('shippers.id', $shipper->id)
            ->exists() && $this->isDispatcher();
    }

    public function isSuperadmin(): bool
    {
        return $this->role === self::ROLE_SUPERADMIN;
    }

    public function isBusinessOwner(): bool
    {
        return $this->role === self::ROLE_BUSINESS;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isManager(): bool
    {
        return $this->role === self::ROLE_MANAGER;
    }

    public function isDriver(): bool
    {
        return $this->role === self::ROLE_DRIVER;
    }

    public function isDispatcher(): bool
    {
        return $this->role === self::ROLE_DISPATCHER;
    }

    public function isClient(): bool
    {
        return $this->role === self::ROLE_CLIENT;
    }

    public function isClientOf(Shipper $shipper): bool
    {
        return $this->isClient() && $this->isMemberOf($shipper);
    }

    public function isMemberOf(Shipper $shipper): bool
    {
        if ($this->isSuperadmin()) return true;
        if ($this->isBusinessOwner()) {
            return $this->owns($shipper);
        }

        return $this->shippers()
            ->where('shippers.id', $shipper->id)
            ->exists();
    }

    public function isSubordinateOf(User $user): bool
    {
        if (in_array($this->role, [User::ROLE_BUSINESS, User::ROLE_SUPERADMIN])) return false;
        return $user->role < $this->role;
    }

    public function sameShipperWith(User $user): bool
    {
        return $user->getShipper()->id === $this->getShipper()->id;
    }

    public function getShipper(): ?Shipper
    {
        if ($this->isClient()) return null;

        return $this->isBusinessOwner() ?
            $this->controlledShippers->first() :
            $this->shippers->first();
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        Mail::to($this->email)->send(
            New UserEmailVerificationNotification($this)
        );
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @return string
     */
    public function verificationUrl(): string
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $this->getKey(),
                'hash' => sha1($this->getEmailForVerification()),
            ]
        );
    }

    public function getSidebarItems(): array
    {
        $sidebarItems = [
            'contacts',

            'sales', // category
            'leads',
            'quotes',

            'dispatch', // category
            'loads',
            'tracking',

            'users', // category
            'clients',
            'admins',
            'managers',
            'drivers',
            'dispatchers'
        ];

        $sidebarItems = collect($sidebarItems)
            ->combine($sidebarItems);

        $sidebarItemsByRole = [
            User::ROLE_SUPERADMIN => $sidebarItems,
            User::ROLE_BUSINESS => $sidebarItems,
            User::ROLE_ADMIN => $sidebarItems
                ->except('admins'),
            User::ROLE_MANAGER => $sidebarItems
                ->except('admins', 'managers'),
            User::ROLE_DRIVER => $sidebarItems
                ->only('dispatch', 'loads'),
            User::ROLE_DISPATCHER => $sidebarItems
                ->only('dispatch', 'loads'),
            User::ROLE_CLIENT => $sidebarItems
                ->only(['sales', 'quotes', 'dispatch', 'loads'])
        ];

        return $sidebarItemsByRole[$this->role]
            ->values()
            ->toArray();
    }

    public static function getAvatarFolder(): string
    {
        return storage_path('app/public/avatars/');
    }

    public function setAvatar(string $name): string
    {
        $this->avatar = $name;
        $this->save();
        return $name;
    }

    public function getAvatarUrl(): ?string
    {
        if (!$this->avatar) return false;
        return url('storage/avatars/' . $this->avatar);
    }
}
