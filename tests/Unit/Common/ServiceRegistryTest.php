<?php

namespace Tests\Unit;

use Tests\TestCase;

class ServiceRegistryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (env('GITHUB_ACTIONS') === true) {
            $this->markTestSkipped('All tests in this file are inactive for this server configuration!');
        }
    }

    public function testShouldHaveProperAppName()
    {
        $pattern = '/[a-z]+\-service/';
        $name = config('app.name');

        $this->assertNotEmpty($name);
        $this->assertMatchesRegularExpression($pattern, $name);
    }
}
