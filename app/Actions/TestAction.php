<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class TestAction
{
    use AsAction;

    public function handle(string $message)
    {
        dispatch($this->makeJob());
    }

    public function asJob(string $message): void
    {
        $this->handle($message);
    }
}
