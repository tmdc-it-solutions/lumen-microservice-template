<?php

namespace App\Providers;

use mmghv\LumenRouteBinding\RouteBindingServiceProvider as BaseServiceProvider;

class RouteBindingServiceProvider extends BaseServiceProvider
{
    /**
     * Boot the service provider
     */
    public function boot()
    {
    }

    protected function bindShortUuidToModel(string $key, string $modelName)
    {
        $this->binder->bind($key, $this->getBinder('App\Models', $modelName));
    }

    protected function getBinder(string $namespace, string $modelName)
    {
        return $namespace . '\\' . $modelName . '@findByShortUuid';
    }
}
