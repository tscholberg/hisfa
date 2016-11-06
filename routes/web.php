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

/* Development notes:
 *
 * authentication: add middleware auth to only access a route when the user is logged in
 *
 * */

// Login, reset account, ...
Auth::routes();

// Dashboard
Route::get('/', 'homeController@index');
Route::get('/dashboard', 'homeController@index');

// Profile
Route::get('/profile', ['middleware' => 'auth', 'uses' => 'ProfileController@index']);
Route::post('/profile/update-password', 'ProfileController@updatePassword');
Route::post('/profile/update-profile-picture', 'ProfileController@updateProfilePicture');

// Foam
Route::get('/foam', ['middleware' => 'auth', 'uses' => 'typeFoamController@index']);
Route::get('/foam/{id}/delete', ['middleware' => 'auth', 'uses' => 'typeFoamController@destroy']);
Route::get('/foam/add', ['middleware' => 'auth', 'uses' => 'typeFoamController@create']);
Route::post('/foam/add', ['middleware' => 'auth', 'uses' => 'typeFoamController@store']);
Route::get('/foam/{id}/edit', ['middleware' => 'auth', 'uses' => 'typeFoamController@edit']);
Route::post('/foam/{id}/edit', ['middleware' => 'auth', 'uses' => 'typeFoamController@update']);

// Primesilos
Route::get('/primesilos', ['middleware' => 'auth', 'uses' => 'PrimeSiloController@index']);
Route::post('/primesilos/create', ['middleware' => 'auth', 'uses' => 'PrimeSiloController@addPrimeSilo']);
Route::delete('/primesilos/delete', ['middleware' => 'auth', 'uses' => 'PrimeSiloController@deletePrimeSilo']);

// Wastesilos
Route::get('/wastesilos', ['middleware' => 'auth', 'uses' => 'WasteSiloController@index']);
Route::post('/wastesilos/create', ['middleware' => 'auth', 'uses' => 'WasteSiloController@addWasteSilo']);
Route::delete('/wastesilos/delete', ['middleware' => 'auth', 'uses' =>'WasteSiloController@deleteWasteSilo']);

// Blocks
Route::get('/blocks', ['middleware' => 'auth', 'uses' => 'BlockController@index']);


