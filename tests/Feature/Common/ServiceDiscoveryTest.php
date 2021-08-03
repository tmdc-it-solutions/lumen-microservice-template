<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServiceDiscoveryTest extends TestCase
{

    public function testShouldGetCorrectNameAndVersion()
    {
        $data = [];

        $this->withAcceptHeader()
            ->json('GET', '/api/discovery', $data, $this->headers)
            ->seeJson([
                'name' => config('app.name'),
                'version' => app()->version()
            ]);
    }
}
