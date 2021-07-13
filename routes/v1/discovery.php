<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'discovery'], function () use ($router) {

    $router->get('', [
        'as' => 'discovery.index',
        'uses' => 'ServiceDiscoveryController@index'
    ]);

    $router->get('name', [
        'as' => 'discovery.name',
        'uses' => 'ServiceDiscoveryController@name'
    ]);

    $router->get('version', [
        'as' => 'discovery.version',
        'uses' => 'ServiceDiscoveryController@version'
    ]);
});
