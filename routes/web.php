<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

  $router->get('items',  ['uses' => 'ListController@index']);

  $router->post('items', ['uses' => 'ListController@create']);

  $router->delete('items/{id}', ['uses' => 'ListController@delete']);

  $router->put('items/{id}', ['uses' => 'ListController@update']);

  $router->get('items/{id}', ['uses' => 'ListController@show']);

  $router->get('getCount', ['uses' => 'ListController@getCount']);


$router->get('auth/google', 'Auth\LoginController@redirectToGoogle');
$router->get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
