<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ServiceDiscoveryTest extends TestCase
{
    public $hello_world;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldGetCorrectNameAndVersion()
    {
        $this->json('GET', '/v1/discovery')
            ->seeJson([
                'name' => config('app.name'),
                'version' => app()->version()
            ]);
    }
}
