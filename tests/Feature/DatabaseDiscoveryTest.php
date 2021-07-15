<?php

namespace Tests\Feature;
    
use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;

class DatabaseDiscoveryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Ensures that the service can migrate and connect to a database.
     * @return void
     */
    public function testShouldSeeMigrationsTableInDatabase()
    {
        $this->seeInDatabase('migrations', []);
    }
}