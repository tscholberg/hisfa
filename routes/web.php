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
Route::get('/foam/add', 'typeFoamController@routeAdd');
Route::post('/foam/add', 'typeFoamController@add');
Route::delete('/foam/delete', 'typeFoamController@delete');

// Blocks
<<<<<<< HEAD
Route::get('/blocks', 'BlockController@index');
Route::get('/blocks/add', 'BlockController@routeAdd');
Route::post('/blocks/add', 'BlockController@add');
Route::post('/blocks/update/{id}', 'BlockController@routeUpdate');
Route::post('/blocks/update', 'BlockController@update');
=======
Route::get('/blocks', 'BlockController@index')->middleware('permission:view_stock');
Route::post('/blocks/addBlock', 'BlockController@addBlock')->middleware('permission:manage_stock');
Route::post('/blocks/updateBlock/{id}', 'BlockController@updateBlock')->middleware('permission:manage_stock');
Route::post('/blocks', 'BlockController@update')->middleware('permission:manage_stock');
>>>>>>> 7d1b5839fdcc6218fa6e8ffa0ae848b335de3a6c

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

