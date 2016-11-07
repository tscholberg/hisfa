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


// Dashboard
Route::get('/', 'homeController@index');
Route::get('/dashboard', 'homeController@index');

// Profile
Route::get('/profile', 'ProfileController@index');
Route::post('/profile/update-password', 'ProfileController@updatePassword');
Route::post('/profile/update-profile-picture', 'ProfileController@updateProfilePicture');
Route::post('/profile/update-email', 'ProfileController@updateEmailPreferences');

// Foam
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

// Users
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::get('/users/{id}', 'UserController@detail');
Route::get('/users/{id}/edit', 'UserController@update');
Route::get('/users/{id}/delete', 'UserController@delete');


// Login, reset account, ...
Auth::routes();

