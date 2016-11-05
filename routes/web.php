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


//login
/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', function(){
    return redirect()->route('login');
});*/
/*Route::get('/login', 'LoginController@__construct');

//logout
Route::get('/logout', 'LogoutController@index');

//password
Route::get('/password/reset', 'ResetController@index');
*/

Route::get('/', 'homeController@index');


//dashboard and home
Route::get('/dashboard', 'homeController@index');
Route::get('/home', 'homeController@index');






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

// Wastesilos
Route::get('/wastesilos', 'WasteSiloController@index');
Route::post('/wastesilos/create', 'WasteSiloController@addWasteSilo');
Route::delete('/wastesilos/delete', 'WasteSiloController@deleteWasteSilo');

// Blocks
Route::get('/blocks', 'BlockController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');
