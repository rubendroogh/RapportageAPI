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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('reports',  ['uses' => 'ReportController@index']);
    $router->get('reports/{id}', ['uses' => 'ReportController@read']);
    $router->post('reports', ['uses' => 'ReportController@create']);
    $router->delete('reports/{id}', ['uses' => 'ReportController@delete']);
    $router->put('reports/{id}', ['uses' => 'ReportController@update']);

    $router->get('templates',  ['uses' => 'TemplateController@index']);
    $router->get('templates/{id}', ['uses' => 'TemplateController@read']);
    $router->post('templates', ['uses' => 'TemplateController@create']);
    $router->delete('templates/{id}', ['uses' => 'TemplateController@delete']);
    $router->put('templates/{id}', ['uses' => 'TemplateController@update']);

    $router->get('users',  ['uses' => 'UserController@index']);
    $router->get('users/{id}', ['uses' => 'UserController@read']);
    $router->post('users', ['uses' => 'UserController@create']);
    $router->delete('users/{id}', ['uses' => 'UserController@delete']);
    $router->put('users/{id}', ['uses' => 'UserController@update']);
});
