<?php

/** @var \Dingo\Api\Routing\Router $api */

$api->group(['prefix' => 'discovery'], function ($api) {

    $api->get('', [
        'as' => 'discovery.index',
        'uses' => 'ServiceDiscoveryController@index'
    ]);
});
