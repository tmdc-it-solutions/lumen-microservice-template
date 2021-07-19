<?php

namespace Tests\Feature;
    
use Tests\TestCase;

class ServiceDiscoveryTest extends TestCase
{

    public function testShouldGetCorrectNameAndVersion()
    {
        $this->json('GET', '/api/v1/discovery')
            ->seeJson([
                'name' => config('app.name'),
                'version' => app()->version()
            ]);
    }
}
