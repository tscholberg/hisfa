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

// Primesilos
Route::get('/primesilos', 'PrimeSiloController@index');
//Route::get('/primesilos/create', 'PrimeSilosController@create');
//Route::post('/primesilos/create/store', 'PrimeSilosController@addprimesilo');
//Route::delete('/primesilos/edit/deleted', 'PrimeSilosController@deleteprime');
//
//// Wastesilos
//Route::get('/wastesilos', 'WasteSilosController@index');
//Route::get('/wastesilos/edit', 'WasteSilosController@edit');
//Route::put('/wastesilos/edit/edited', 'WasteSilosController@editwaste');