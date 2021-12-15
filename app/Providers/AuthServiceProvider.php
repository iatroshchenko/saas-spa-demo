<?php

namespace App\Providers;

use App\Models\Quote;
use App\Models\Shipper;
use App\Models\User;
use App\Models\Load;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-users-for-shipper', function (User $user, Shipper $shipper) {
            $roleList = [
              User::ROLE_SUPERADMIN,
              User::ROLE_MANAGER,
              User::ROLE_BUSINESS,
              User::ROLE_ADMIN
            ];

            return in_array($user->role, $roleList) && $user->isMemberOf($shipper);
        });

        Gate::define('create-clients-for-shipper', function (User $user, Shipper $shipper) {
            $roleList = [
                User::ROLE_SUPERADMIN,
                User::ROLE_MANAGER,
                User::ROLE_BUSINESS,
                User::ROLE_ADMIN
            ];

            return in_array($user->role, $roleList) && $user->isMemberOf($shipper);
        });

        Gate::define('update-user', function (User $user, User $targetUser) {
            if ($user->isSuperadmin()) return true;

            return $targetUser->isSubordinateOf($user)
                && $user->sameShipperWith($targetUser);
        });

        Gate::define('delete-user', function (User $user, User $targetUser) {
            if ($user->isSuperadmin()) return true;

            return $targetUser->isSubordinateOf($user)
                && $user->sameShipperWith($targetUser);
        });

        Gate::define('get-quotes-for-shipper', function (User $user, Shipper $shipper) {
            if ($user->isSuperadmin()) return true;

            return $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper)
                || $user->isClientOf($shipper);
        });

        Gate::define('create-orders-for-shipper', function (User $user, Shipper $shipper) {
            if ($user->isSuperadmin()) return true;

            return $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper);
        });

        Gate::define('create-quotes-for-shipper', function (User $user, Shipper $shipper) {
            if ($user->isSuperadmin()) return true;

            return $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper)
                || $user->isClientOf($shipper);
        });

        Gate::define('get-quote', function (User $user, Quote $quote) {
            if ($user->isSuperadmin()) return true;
            if ($user->owns($quote->shipper) || $user->ownsQuote($quote)) return true;

            if ($user->isMemberOf($quote->shipper)) {
                if (in_array($user->role, [
                    User::ROLE_ADMIN,
                    User::ROLE_MANAGER
                ])) return true;
            }

            return false;
        });

        Gate::define('edit-quote', function (User $user, Quote $quote) {
            return $user->can('get-quote', $quote);
        });

        Gate::define('delete-quote', function (User $user, Quote $quote) {
            return $user->can('get-quote', $quote);
        });

        Gate::define('convert-quote-to-order', function (User $user, Quote $quote) {
            return $user->can('edit-quote', $quote);
        });

            Gate::define('pay-quote', function (User $user, Quote $quote) {
                return $user->can('get-quote', $quote);
            });

        Gate::define('get-loads-for-shipper', function (User $user, Shipper $shipper) {
            if ($user->isSuperadmin()) return true;

            return $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper)
                || $user->isClientOf($shipper)
                || $user->isDispatcherFor($shipper)
                || $user->isDriverFor($shipper);
        });

        Gate::define('create-loads-for-shipper', function (User $user, Shipper $shipper) {
            if ($user->isSuperadmin()) return true;

            return $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper)
                || $user->isClientOf($shipper);
        });

        Gate::define('get-load', function (User $user, Load $load) {
            if ($user->isSuperadmin()) return true;
            if ($user->owns($load->shipper) || $user->ownsLoad($load)) return true;

            if ($user->isMemberOf($load->shipper)) {
                if (in_array($user->role, [
                    User::ROLE_ADMIN,
                    User::ROLE_MANAGER,
                    User::ROLE_DRIVER,
                    User::ROLE_DISPATCHER
                ])) return true;
            }

            return false;
        });

        Gate::define('edit-load', function (User $user, Load $load) {
            if ($user->isSuperadmin()) return true;
            if ($user->owns($load->shipper) || $user->ownsLoad($load)) return true;

            if ($user->isMemberOf($load->shipper)) {
                if (in_array($user->role, [
                    User::ROLE_ADMIN,
                    User::ROLE_MANAGER,
                    User::ROLE_DISPATCHER
                ])) return true;
            }

            return false;
        });

        Gate::define('delete-load', function (User $user, Load $load) {
            return $user->can('edit-load', $load);
        });

        Gate::define('email-load', function (User $user, Load $load) {
           return $user->can('edit-load', $load);
        });

        Gate::define('get-shipper-drivers', function ($user, $shipper) {
            return $user->isSuperadmin()
                || $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper)
                || $user->isDispatcherFor($shipper);
        });

        Gate::define('assign-loads-to-drivers-for-shipper', function ($user, $shipper) {
            return $user->isSuperadmin()
                || $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper)
                || $user->isDispatcherFor($shipper);
        });

        Gate::define('get-shipper-email-templates', function ($user, $shipper) {
            return $user->isSuperadmin()
                || $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper);
        });

        Gate::define('send-credentials-for-shipper', function($user, $shipper) {
            return $user->isSuperadmin()
                || $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper);
        });

        Gate::define('manage-contacts-for-shipper', function ($user, $shipper) {
            return $user->isSuperadmin()
                || $user->owns($shipper)
                || $user->isAdminFor($shipper)
                || $user->isManagerFor($shipper);
        });

        Gate::define('manage-admins', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper);
        });


        Gate::define('manage-managers', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper) || $user->isAdminFor($shipper);
        });


        Gate::define('manage-dispatchers', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper) || $user->isAdminFor($shipper) || $user->isManagerFor($shipper);
        });

        Gate::define('manage-drivers', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper)
                || $user->isAdminFor($shipper) || $user->isManagerFor($shipper)
                || $user->isDispatcherFor($shipper);
        });

        /* Old permissions - need to refactor */
        Gate::define('manage-shipper', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper) || $user->isAdminFor($shipper);
        });

        Gate::define('manage-users', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper) || $user->isAdminFor($shipper) || $user->isManagerFor($shipper);
        });

        Gate::define('get-shipper-users', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper) || $user->isAdminFor($shipper) || $user->isManagerFor($shipper);
        });

        Gate::define('create-users', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper) || $user->isAdminFor($shipper) || $user->isManagerFor($shipper);
        });

        Gate::define('update-users', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper) || $user->isAdminFor($shipper) || $user->isManagerFor($shipper);
        });

        Gate::define('delete-users', function ($user, $shipper) {
            return $user->isSuperadmin() || $user->owns($shipper) || $user->isAdminFor($shipper) || $user->isManagerFor($shipper);
        });

        Gate::define('send-credentials', function($user) {
            return $user->isSuperadmin() || $user->isManager() || $user->isBusinessOwner() || $user->isAdmin();
        });

        Gate::define('directly-update-email', function ($user) {
            return $user->isSuperadmin() || $user->isBusinessOwner();
        });

        Gate::define('view-quotes', function ($user) {
            return $user->isSuperadmin()
                || $user->isBusinessOwner()
                || $user->isManager()
                || $user->isAdmin()
                || $user->isClient();
        });

        Gate::define('update-quotes', function ($user) {
            return $user->isSuperadmin()
                || $user->isBusinessOwner()
                || $user->isManager()
                || $user->isAdmin()
                || $user->isClient();
        });

        Gate::define('delete-quotes', function ($user) {
            return $user->isSuperadmin()
                || $user->isBusinessOwner()
                || $user->isManager()
                || $user->isAdmin()
                || $user->isClient();
        });

        Gate::define('calculate-quote-price', function ($user) {
            return $user->isSuperadmin()
                || $user->isBusinessOwner()
                || $user->isManager()
                || $user->isAdmin()
                || $user->isClient();
        });

        Gate::define('send-quote-email', function ($user) {
            return $user->isSuperadmin()
                || $user->isBusinessOwner()
                || $user->isManager()
                || $user->isAdmin()
                || $user->isClient();
        });

        Gate::define('set-settings', function ($user) {
           return $user->isSuperadmin()
               || $user->isBusinessOwner();
        });

        Gate::define('view-settings', function ($user) {
            return $user->isSuperadmin()
                || $user->isBusinessOwner();
        });
    }
}
