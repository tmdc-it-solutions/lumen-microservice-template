<?php

namespace App\Providers\Common;

use App\Providers\MicroserviceRegistryProvider;
use Illuminate\Support\ServiceProvider;
use LogicException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $this->registerMicroservice($app);
        $this->registerAliases($app);
        $this->registerCommons($app);
        $this->registerThirdParties($app);
    }

    /**
     * @param \Illuminate\Contracts\Foundation\Application
     */
    private function registerMicroservice($app)
    {
        $registry = new MicroserviceRegistryProvider();
        $app->instance('microservice', $registry);
    }

    private function registerAliases($app)
    {
        $app->alias('cache', \Illuminate\Cache\CacheManager::class);
    }

    private function registerCommons($app)
    {
        $app->register(AuthServiceProvider::class);
        $app->register(EventServiceProvider::class);
        $app->register(UuidShortenerServiceProvider::class);
        $app->register(RouteBindingServiceProvider::class);
        $app->register(RabbitEventsServiceProvider::class);
    }

    private function registerThirdParties($app)
    {
        $app->register(\Tymon\JWTAuth\Providers\LumenServiceProvider::class);
        $app->register(\mmghv\LumenRouteBinding\DingoServiceProvider::class);
        $app->register(\Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
        $app->register(\Spatie\EventSourcing\EventSourcingServiceProvider::class);
        $app->register(\Silber\Bouncer\BouncerServiceProvider::class);
        $app->register(\Dyrynda\Database\LaravelEfficientUuidServiceProvider::class);
    }
}
