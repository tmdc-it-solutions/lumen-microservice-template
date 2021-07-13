<?php

namespace App\Projectors;

use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class ExampleProjector extends Projector
{
    public function onEventHappened(EventHappened $event)
    {
        // Handle event
    }
}
