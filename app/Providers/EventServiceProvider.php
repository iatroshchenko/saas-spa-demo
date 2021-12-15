<?php

namespace App\Providers;

use App\Events\OrderInitiated;
use App\Events\Register\RegisteredBusinessUser;
use App\Listeners\CreateShipperForBusinessUser;
use App\Listeners\OrderInitiatedListener;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RegisteredBusinessUser::class => [
            CreateShipperForBusinessUser::class
        ],
        OrderInitiated::class => [
            OrderInitiatedListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
