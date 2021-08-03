<?php

namespace Tests\Unit;

use Tests\TestCase;

class UUIDShortenerTest extends TestCase
{

    protected $longUuid = '1a957c48-ec61-4531-a04a-e7309d31622b';
    protected $shortUuid = 'UqZjp5nn7kJVhFLtegGcj6';

    public function testShouldShortenUuid()
    {
        $this->assertEquals(reduce_uuid($this->longUuid), $this->shortUuid);
    }

    public function testShouldExpandUuid()
    {
        $this->assertEquals(expand_uuid($this->shortUuid), $this->longUuid);
    }
}
