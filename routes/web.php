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

// Primesilos
Route::get('/primesilos', 'PrimeSiloController@index');
Route::post('/primesilos/create', 'PrimeSiloController@addPrimeSilo');
Route::delete('/primesilos/delete', 'PrimeSiloController@deletePrimeSilo');
Route::put('/primesilos/updatecapacity', 'PrimeSiloController@updateCapacityPrimeSilo');
Route::put('/primesilos/updateresource', 'PrimeSiloController@updateResourcePrimeSilo');


// Wastesilos
Route::get('/wastesilos', 'WasteSiloController@index');
Route::post('/wastesilos/create', 'WasteSiloController@addWasteSilo');
Route::delete('/wastesilos/delete', 'WasteSiloController@deleteWasteSilo');
Route::put('/wastesilos/updatecapacity', 'WasteSiloController@updateCapacityWasteSilo');


// Foam
Route::get('/foam/add', 'typeFoamController@routeAdd');
Route::post('/foam/add', 'typeFoamController@add');
Route::delete('/foam/delete', 'typeFoamController@delete');

// Blocks
Route::get('/blocks', 'BlockController@index');
Route::get('/blocks/add', 'BlockController@routeAdd');
Route::post('/blocks/add', 'BlockController@add');
Route::post('/blocks/update/{id}', 'BlockController@routeUpdate');
Route::post('/blocks/update', 'BlockController@update');

// Users
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users/store', 'UserController@store');
Route::get('/users/{id}', 'UserController@detail');
Route::post('/users/{id}/edit', 'UserController@edit');
Route::get('/users/{id}/delete', 'UserController@delete');

// Login, reset account, ...
Auth::routes();

