<?php

namespace App\Providers;

use App\Events\MoneyAdded;
use Illuminate\Support\Facades\App;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        App::bindMethod(MoneyAdded::class . '@handle', fn ($action) => $action->handle());
    }

    public function bind($class)
    {

    }
}
