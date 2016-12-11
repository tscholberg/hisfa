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
Route::get('/primesilos', 'PrimeSiloController@index')->middleware('permission:view_prime_silos');
Route::get('/primesilos/add', 'PrimeSiloController@addPrimeSilo')->middleware('permission:manage_prime_silos');
Route::post('/primesilos/create', 'PrimeSiloController@createPrimeSilo')->middleware('permission:manage_prime_silos');
Route::get('/primesilos/{id}/delete', 'PrimeSiloController@deletePrimeSilo')->middleware('permission:manage_prime_silos');
Route::put('/primesilos/updatecapacity', 'PrimeSiloController@updateCapacityPrimeSilo')->middleware('permission:manage_prime_silos');
Route::put('/primesilos/updateresource', 'PrimeSiloController@updateResourcePrimeSilo')->middleware('permission:manage_prime_silos');

// Wastesilos
Route::get('/wastesilos', 'WasteSiloController@index')->middleware('permission:view_waste_silos');
Route::get('/wastesilos/add', 'WasteSiloController@add')->middleware('permission:manage_waste_silos');
Route::post('/wastesilos/create', 'WasteSiloController@create')->middleware('permission:manage_waste_silos');
Route::get('/wastesilos/{id}/delete', 'WasteSiloController@delete')->middleware('permission:manage_waste_silos');
Route::put('/wastesilos/updatecapacity', 'WasteSiloController@update')->middleware('permission:manage_waste_silos');

// Foam
Route::get('/foam/addType', 'typeFoamController@routeAddType');
Route::post('/foam/addType', 'typeFoamController@addType');
Route::get('/foam/addLength', 'typeFoamController@routeAddLength');
Route::post('/foam/addLength', 'typeFoamController@addLength');
Route::delete('/foam/delete', 'typeFoamController@delete');
Route::delete('/foam/deleteLength', 'typeFoamController@deleteLength');
Route::put('/foam/increment', 'typeFoamController@increment');
Route::put('/foam/decrement', 'typeFoamController@decrement');

// Blocks
Route::get('/blocks', 'BlockController@index')->middleware('permission:view_stock');

// Users
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create')->middleware('permission:admin');
Route::post('/users/store', 'UserController@store')->middleware('permission:manage_users');
Route::get('/users/{id}', 'UserController@detail')->middleware('permission:manage_users');
Route::post('/users/{id}/edit', 'UserController@edit')->middleware('permission:manage_users');
Route::get('/users/{id}/delete', 'UserController@delete')->middleware('permission:admin');

//logs
Route::get('/logs', 'LogController@index')->middleware('permission:admin');

//errors
Route::get('/noaccess', 'UserController@denied');

// Resources
Route::get('/resources', 'ResourceController@index')->middleware('permission:view_resources');
Route::get('/resources/add', 'ResourceController@add')->middleware('permission:manage_resources');
Route::get('/resources/{id}', 'ResourceController@detail')->middleware('permission:manage_resources');
Route::post('/resources/{id}/edit', 'ResourceController@edit')->middleware('permission:manage_resources');

// Login, reset account, ...
Auth::routes();