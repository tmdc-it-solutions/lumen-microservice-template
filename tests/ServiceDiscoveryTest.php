<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ServiceDiscoveryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function should_get_correct_name_and_version()
    {
        $this->json('GET', '/v1/discovery')
            ->seeJson([
                'name' => config('app.name'),
                'version' => app()->version()
            ]);
    }
}
