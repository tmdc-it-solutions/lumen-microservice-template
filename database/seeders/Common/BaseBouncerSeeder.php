<?php

namespace Database\Seeders\Common;

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

abstract class BaseBouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->registerDefaults();
        $this->register();
    }

    /**
     * Seed default roles from config.
     *
     * @return void
     */
    protected function registerDefaults()
    {
        // Register superadmin role
        Bouncer::allow('superadmin')->everything();

        // Register roles from config
        $roles = config('roles.roles');

        foreach ($roles as $name => $title) {
            Bouncer::role()->firstOrCreate([
                'name' => $name,
                'title' => $title
            ]);
        }
    }

    /**
     * Register service roles and permissions.
     *
     * @return void
     */
    abstract protected function register();
}
