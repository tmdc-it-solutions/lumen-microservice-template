<?php

namespace App\Providers\Common;

use \Nuwber\Events\RabbitEventsServiceProvider as BaseProvider;

class RabbitEventsServiceProvider extends BaseProvider
{
    protected $listen;

    public function register(): void
    {
        $this->registerListeners();
        parent::register();
    }

    private function registerListeners()
    {
        $listeners =  app('microservice')->getRabbitEventListeners();
        $this->listen = $listeners;
    }
}
