<?php

namespace App\Providers;

use App\ApiService\TwilioService;
use Illuminate\Support\ServiceProvider;
use Twilio\Http\Response;
use Twilio\Rest\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $sid = config('twilio.account_id');
        $token = config('twilio.auth_token');
        $fromPhone = config('twilio.from_phone');
        $trialPhone = config('twilio.trial_phone');

        if (!$sid || !$token || !$fromPhone || !$trialPhone) {
            throw new \DomainException('Please Set Up Twilio environment variables');
        }

        $this->app->singleton(Client::class, function ($app) use ($sid, $token) {

            return new Client(
                $sid,
                $token
            );
        });

        $this->app->when(TwilioService::class)
            ->needs('$from')
            ->give($fromPhone);

        $this->app->when(TwilioService::class)
            ->needs('$trial')
            ->give($trialPhone);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
    }
}
