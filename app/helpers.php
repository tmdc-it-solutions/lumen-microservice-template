<?php

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('publish_event')) {

    /**
     * Publishes an event to RabbitMQ and stores the event
     */
    function publish_event($event)
    {
        event($event);
        publish($event);
    }
}
