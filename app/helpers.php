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

if (!function_exists('app_path')) {
    /**
     * Get the application path.
     *
     * @param  string $path
     * @return string
     */
    function app_path($path = '')
    {
        return app()->basePath() . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('reduce_uuid')) {

    /**
     * Reduces the a long UUID into short length.
     *
     * @param  string $longUuid
     * @return string
     */
    function reduce_uuid($longUuid)
    {
        return app('uuid.shortener')->reduce($longUuid);
    }
}

if (!function_exists('expand_uuid')) {

    /**
     * Expand the a short UUID into full length.
     *
     * @param  string $longUuid
     * @return string
     */
    function expand_uuid($shortUuid)
    {
        return app('uuid.shortener')->expand($shortUuid);
    }
}
