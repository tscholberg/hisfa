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
/*Route::get('/foam', 'typeFoamController@index');
Route::get('/foam/{id}/delete', 'typeFoamController@destroy');
Route::get('/foam/add', 'typeFoamController@create');
Route::post('/foam/add', 'typeFoamController@store');
Route::get('/foam/{id}/edit', 'typeFoamController@edit');
Route::post('/foam/{id}/edit', 'typeFoamController@update');*/

// Primesilos
Route::get('/primesilos', 'PrimeSiloController@index');
Route::post('/primesilos/create', 'PrimeSiloController@addPrimeSilo');
Route::get('/primesilos/{id}/delete', 'PrimeSiloController@deletePrimeSilo');
Route::put('/primesilos/updatecapacity', 'PrimeSiloController@updateCapacityPrimeSilo');
Route::put('/primesilos/updateresource', 'PrimeSiloController@updateResourcePrimeSilo');


// Wastesilos
Route::get('/wastesilos', 'WasteSiloController@index');
Route::post('/wastesilos/create', 'WasteSiloController@addWasteSilo');
Route::get('/wastesilos/{id}/delete', 'WasteSiloController@deleteWasteSilo');

Route::put('/wastesilos/updatecapacity', 'WasteSiloController@updateCapacityWasteSilo');


// Foam
Route::get('/foam', 'typeFoamController@index');
Route::post('/foam/addType', 'typeFoamController@addType');
Route::delete('/foam/deleteType', 'typeFoamController@deleteType');

// Blocks
Route::get('/blocks', 'BlockController@index')->middleware('permission:view_stock');
Route::post('/blocks/addBlock', 'BlockController@addBlock')->middleware('permission:manage_stock');
Route::post('/blocks/updateBlock/{id}', 'BlockController@updateBlock')->middleware('permission:manage_stock');
Route::post('/blocks', 'BlockController@update')->middleware('permission:manage_stock');

// Users
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create')->middleware('permission:admin');
Route::post('/users/store', 'UserController@store')->middleware('permission:manage_users');
Route::get('/users/{id}', 'UserController@detail')->middleware('permission:manage_users');
Route::post('/users/{id}/edit', 'UserController@edit')->middleware('permission:manage_users');
Route::get('/users/{id}/delete', 'UserController@delete')->middleware('permission:admin');

//errors
Route::get('/noaccess', 'UserController@denied');

// Resources
Route::get('/resources', 'ResourceController@index');
Route::get('/resources/{id}', 'ResourceController@single');
Route::post('/resources/{id}/edit', 'ResourceController@edit');

// Login, reset account, ...
Auth::routes();

