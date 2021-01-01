<?php

namespace App\Providers;

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

        Gate::before(function ($user) {
            if ($user->hasPermission('no-limit')) {
                return true;
            }
        });

        Gate::define('user-permission', function ($user) {
            if ($user->hasPermission('user-permission')) {
                return true;
            }
        });

        Gate::define('role-permission', function ($user) {
            if ($user->hasPermission('role-permission')) {
                return true;
            }
        });

        Gate::define('item-permission', function ($user) {
            if ($user->hasPermission('item-permission')) {
                return true;
            }
        });

        Gate::define('category-permission', function ($user) {
            if ($user->hasPermission('category-permission')) {
                return true;
            }
        });

        Gate::define('material-permission', function ($user) {
            if ($user->hasPermission('material-permission')) {
                return true;
            }
        });
    }
}
