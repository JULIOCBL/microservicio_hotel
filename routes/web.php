<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return response()->json(['API' => 'Hotel']);
});
$router->post('buscar',"GeoAutocomplete@show");
$router->post('hotelDisponibilidad',"SearchAvailController@show");

$router->post('getImage',"SearchAvailController@getImage");

$router->post('getHotelSearch',"SearchAvailController@getImage");
$router->post('get',"SearchAvailController@getImage");
$router->post('getImage',"SearchAvailController@getImage");
$router->post('getImage',"SearchAvailController@getImage");
$router->post('getImage',"SearchAvailController@getImage");
