<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Users
Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@create');
Route::get('/users/{userId}', 'UserController@get');
Route::patch('/users/{userId}', 'UserController@update');
Route::delete('/users/{userId}', 'UserController@delete');
