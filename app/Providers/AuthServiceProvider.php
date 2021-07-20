<?php

namespace App\Providers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->grantSuperAdminPermissions();
    }

    /**
     * Implicitly grant "Super Admin" role all permissions
     * This works in the app by using gate-related functions like auth()->user->can() and @can()
     */
    private function grantSuperAdminPermissions()
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
