<?php

namespace App\Events;

class AccountCreated extends ShouldBeStoredAndPublished
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
