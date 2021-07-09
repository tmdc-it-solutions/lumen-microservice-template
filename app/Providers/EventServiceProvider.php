<?php

namespace App\Providers;

use App\Actions\TestAction;
use Illuminate\Support\Facades\App;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->bind(TestAction::class);
    }

    public function bind($class)
    {
        App::bindMethod($class . '@handle', fn ($action) => $action->handle());
    }
}
