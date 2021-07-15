<?php

namespace Tests\Unit;

use Tests\TestCase;

class ServiceRegistryTest extends TestCase
{
    public function testShouldHaveProperAppName()
    {
        $pattern = '/[a-z]+\-service/';
        $name = config('app.name');

        $this->assertNotEmpty($name);
        $this->assertMatchesRegularExpression($pattern, $name);
    }
}
