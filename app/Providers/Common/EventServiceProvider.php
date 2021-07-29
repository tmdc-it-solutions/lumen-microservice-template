<?php

namespace App\Providers\Common;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function register()
    {
        $listeners = app('microservice')->getEventListeners();
        $subscribers = app('microservice')->getSubscribers();

        $this->listen = $listeners;
        $this->subscribe = $subscribers;
    }
}
