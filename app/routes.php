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
use Dimsav\Todo\Models\Todo;

Route::get('/', function()
{
	return View::make('pages.todos');
});

Route::get('todos', function()
{
	return Todo::all();
});

Route::post('todos', function(){
	$todo = new Todo;
	$todo->text = Input::get('text');
	$todo->finished = Input::get('finished');
	$todo->user_id = 1;
	$todo->save();
});