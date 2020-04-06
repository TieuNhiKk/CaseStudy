<?php

namespace App\Providers;

use App\User;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->name != 'customer') {
                    return true;
                }
            }

            return false;
        });

        Gate::define('employee', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->name == 'employee') {
                    return true;
                }
            }
            return false;
        });

        Gate::define('customer', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->name == 'customer') {
                    return true;
                }
            }

            return false;
        });
    }
}
