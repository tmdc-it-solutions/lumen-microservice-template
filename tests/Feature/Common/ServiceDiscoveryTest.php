<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServiceDiscoveryTest extends TestCase
{

    public function testShouldGetCorrectNameAndVersion()
    {
        $data = [];
        $headers = $this->withAcceptHeader([]);

        $this->json('GET', '/api/discovery', $data, $headers)
            ->seeJson([
                'name' => config('app.name'),
                'version' => app()->version()
            ]);
    }
}
