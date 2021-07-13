<?php

namespace App\Events;

use Jozi\Events\StoredRabbitEvent;

class AccountCreated extends StoredRabbitEvent
{
    public $eventKey = 'account.created';

    /** @var array */
    public $accountAttributes;

    public function __construct(array $accountAttributes)
    {
        $this->accountAttributes = $accountAttributes;
    }

    public function toPublish(): array
    {
        return $this->accountAttributes;
    }
}
