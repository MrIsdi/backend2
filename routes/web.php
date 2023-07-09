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
    return $router->app->version();
});

$router->get('/sensor', 'SensorController@index');
$router->post('/sensor', 'SensorController@store');
$router->get('/sensor/{id}', 'SensorController@show');
$router->put('/sensor/{id}', 'SensorController@update');
$router->delete('/sensor/{id}', 'SensorController@delete');

$router->get('/yolov1', 'Yolov1Controller@index');
$router->post('/yolov1', 'Yolov1Controller@store');
$router->get('/yolov1/{id}', 'Yolov1Controller@show');
$router->put('/yolov1/{id}', 'Yolov1Controller@update');
$router->delete('/yolov1/{id}', 'Yolov1Controller@delete');

$router->get('/yolov2', 'Yolov2Controller@index');
$router->post('/yolov2', 'Yolov2Controller@store');
$router->get('/yolov2/{id}', 'Yolov2Controller@show');
$router->put('/yolov2/{id}', 'Yolov2Controller@update');
$router->delete('/yolov2/{id}', 'Yolov2Controller@delete');
