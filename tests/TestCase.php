<?php

namespace Tests;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }

    /**
     * Create headers array with Accept header attached.
     *
     * @return array
     */
    public function withAcceptHeader(array $headers)
    {
        $subtype = env('API_SUBTYPE', 'appname');
        $headers['Accept'] = "application/vnd.$subtype.v1+json";
        return $headers;
    }
}
