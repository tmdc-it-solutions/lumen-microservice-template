<?php

namespace App\Events;

use Nuwber\Events\Event\ShouldPublish;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

abstract class ShouldBeStoredAndPublished extends ShouldBeStored implements ShouldPublish
{
    /**
     * Event name that is the same as RabbitMQ's routing key. Example: `item.created`.
     *
     * @var string
     */
    public $eventKey;

    public function publishEventKey(): string
    {
        return $this->eventKey;
    }

    abstract public function toPublish(): array;
}
