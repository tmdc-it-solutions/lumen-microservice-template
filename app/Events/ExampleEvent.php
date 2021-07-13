<?php

namespace App\Events;

use Jozi\Events\StoredRabbitEvent;

class ExampleEvent extends StoredRabbitEvent
{
    public $eventKey = 'event.key';

    /** @var array */
    public $eventAttributes;

    public function __construct(array $eventAttributes)
    {
        $this->eventAttributes = $eventAttributes;
    }

    public function toPublish(): array
    {
        return $this->eventAttributes;
    }
}
