<?php
namespace app\Providers;

use \Nuwber\Events\RabbitEventsServiceProvider as BaseProvider;

class RabbitEventsServiceProvider extends BaseProvider
{
    protected $listen = [
        'some.event' => [
            Listener::class
        ],
        'something.*' => [
            WildcardListener::class
        ],
    ];
}
