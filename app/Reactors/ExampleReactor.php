<?php

namespace App\Reactors;

use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class ExampleReactor extends Reactor implements ShouldQueue
{
    public function onEventHappened(EventHappened $event)
    {
        // Handle event
    }
}
