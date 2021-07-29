<?php

namespace Database\Seeders\Common;

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->registerDefaultRoles();
        $this->registerServicePermissions();
    }

    /**
     * Seed default roles from config.
     *
     * @return void
     */
    protected function registerDefaultRoles()
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
     * Register service permissions from the `App\Providers\MicroserviceRegistryProvider`.
     *
     * @return void
     */
    protected function registerServicePermissions()
    {
        app('microservice')->setupBouncerPermissions();
    }
}
