<?php

namespace App\Providers\Common;

use mmghv\LumenRouteBinding\RouteBindingServiceProvider as BaseServiceProvider;

class RouteBindingServiceProvider extends BaseServiceProvider
{
    /**
     * Boot the service provider
     */
    public function boot()
    {
        $routeBindings = app('microservice')->getRouteBindings();

        foreach ($routeBindings as $key => $model) {
            $this->bindShortUuidToModel($key, $model);
        }
    }

    protected function bindShortUuidToModel(string $key, string $model)
    {
        $this->binder->bind($key, $this->getBinder($model));
    }

    protected function getBinder(string $model)
    {
        return $model . '@findByShortUuid';
    }
}
