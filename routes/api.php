<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () use ($router) {
    return 'Welcome to your microservice! Running: ' . $router->app->version();
});

// Load all v1 routes
$router->group(['prefix' => 'api/v1', 'namespace' => 'Api\V1'], function () use ($router) {
    foreach (glob(__DIR__ . '/v1/*.php') as $filename) {
        include $filename;
    }
});
