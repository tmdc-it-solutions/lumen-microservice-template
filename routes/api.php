<?php

/** @var \Dingo\Api\Routing\Router $api */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () use ($api) {
        foreach (glob(__DIR__ . '/v1/*.php') as $filename) {
            include $filename;
        }
    });
});
