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
            $this->bindRouteToModel($key, $model);
        }
    }

    protected function bindRouteToModel(string $key, string $model)
    {
        $this->binder->bind($key, $this->getBinder($model));
    }

    protected function getBinder(string $model)
    {
        return $model . '@findByShortUuid';
    }
}
