<?php

namespace App\Providers\Interface;

interface MicroserviceRegistryInterface
{
    /**
     * Bouncer permissions to be seeded `Database\Seeders\Common\BouncerSeeder`.
     * Use the `Silber\Bouncer\BouncerFacade` facade to setup permissions.
     * Default roles from `config/roles.php` are seeded first.
     */
    public function setupBouncerPermissions(): void;

    /**
     * Determine the order in which the database seeders would be called by `Database\Seeders\DatabaseSeeder`.
     * The first element in this array would be seeded first and so on.
     */
    public function getDatabaseSeedersInOrder(): array;

    /**
     * Route bindings to be registered by `App\Providers\Common\RouteBindingServiceProvider`.
     *
     * @return array
     */
    public function getRouteBindings(): array;

    /**
     * Map of RabbitMQ event listeners to be registered by `App\Providers\Common\RabbitEventsServiceProvider`.
     *
     * @return array
     */
    public function getRabbitEventListeners(): array;

    /**
     * Map of event listeners to be registered by `App\Providers\Common\EventServiceProvider`.
     *
     * @return array
     */
    public function getEventListeners(): array;

    /**
     * Map of subscribers to be registered by `App\Providers\Common\EventServiceProvider`.
     *
     * @return array
     */
    public function getSubscribers(): array;
}
