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
//
//Route::resource('/', function()
//{
//	return View::make('main_page');
//});

Route::resource('/','MainController');
Route::get('/others','MainController@getAll');
Route::resource('/{id}/','MainController');
