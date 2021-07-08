<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class TestAction
{
    use AsAction;

    public function handle(string $message)
    {
        echo $message . PHP_EOL;
    }
}
