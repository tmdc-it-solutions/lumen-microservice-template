<?php

namespace App\Providers\Common;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('eloquent-uuid', function ($app, array $config) {
            return new EloquentUuidUserProvider($app['hash'], $config['model']);
        });
    }
}
