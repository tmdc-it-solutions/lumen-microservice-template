<?php

namespace Tests\Traits\Common;

trait DatabaseSeeding
{
    /**
     * Seeds the database.
     *
     * @return void
     */
    protected function seedDatabase()
    {
        $code = $this->artisan('db:seed');
        assert($code === 0, 'DB was not seeded successfully');
    }
}
