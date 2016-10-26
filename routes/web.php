<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/base', function(){
	return view('layouts/base');
});
Route::get('/foam', 'typeFoamController@index');
Route::get('/foam/{id}/delete', 'typeFoamController@destroy');

Route::get('/foam/add', 'typeFoamController@create');
Route::post('/foam/add', 'typeFoamController@store');

Route::get('/foam/{id}/edit', 'typeFoamController@edit');
Route::post('/foam/{id}/edit', 'typeFoamController@update');

// Primesilos
Route::get('/primesilos', 'PrimeSiloController@index');
Route::post('/primesilos/create', 'PrimeSiloController@addPrimeSilo');
Route::delete('/primesilos/delete', 'PrimeSiloController@deletePrimeSilo');

//// Wastesilos
Route::get('/wastesilos', 'WasteSiloController@index');
Route::post('/wastesilos/create', 'WasteSiloController@addWasteSilo');
Route::delete('/wastesilos/delete', 'WasteSiloController@deleteWasteSilo');