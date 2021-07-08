<?php

namespace App\Providers;

use App\Actions\TestAction;
use Illuminate\Support\Facades\App;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        App::bindMethod(TestAction::class . '@handle', fn ($action) => $action->handle());
    }
}
