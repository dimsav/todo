<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get ('login',    ['uses' => 'AuthController@getLogin', 'as' => 'login']);
Route::post('login',    ['uses' => 'AuthController@postLogin']);
Route::get ('logout',    ['uses' => 'AuthController@getLogout', 'as' => 'logout']);

Route::get ('register', ['uses' => 'AuthController@getRegistration',  'as' => 'registration']);
Route::post('register', ['uses' => 'AuthController@postRegistration']);

Route::group(['before' => 'auth'], function()
{
    Route::get('/', ['uses' => 'TodoController@index', 'as' => 'home']);
    Route::resource('api/todos', 'ApiTodoController', ['only' => ['index', 'store', 'update', 'destroy']]);
});

Event::listen('illuminate.query', function($query)
{
    if (Config::get('app.debug'))
    {
        Log::info($query);
    }
});