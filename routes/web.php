<?php

use App\Notifications\PrimeSiloFull;
use App\Notifications\WasteSiloFull;
use Illuminate\Support\Facades\Auth;

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
Route::delete('/primesilos/delete', 'PrimeSiloController@deletePrimeSilo');
Route::put('/primesilos/updatecapacity', 'PrimeSiloController@updateCapacityPrimeSilo');
Route::put('/primesilos/updateresource', 'PrimeSiloController@updateResourcePrimeSilo');


// Wastesilos
Route::get('/wastesilos', 'WasteSiloController@index');
Route::post('/wastesilos/create', 'WasteSiloController@addWasteSilo');
Route::delete('/wastesilos/delete', 'WasteSiloController@deleteWasteSilo');
Route::put('/wastesilos/updatecapacity', 'WasteSiloController@updateCapacityWasteSilo');


// Foam
Route::get('/foam', 'typeFoamController@index');
Route::post('/foam/addType', 'typeFoamController@addType');
Route::delete('/foam/deleteType', 'typeFoamController@deleteType');

// Blocks
Route::get('/blocks', 'BlockController@index');
Route::post('/blocks/addBlock', 'BlockController@addBlock');

// Users
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users/store', 'UserController@store');
Route::get('/users/{id}', 'UserController@detail');
Route::post('/users/{id}/edit', 'UserController@edit');
Route::get('/users/{id}/delete', 'UserController@delete');

// Resources
Route::get('/resources', 'ResourceController@index');

// Notifications
Route::get('/mailPrime', function () {

    $user = Auth::user();

    $primesilo = Hisfa\PrimeSilo::first();

    $user->notify(new PrimeSiloFull($primesilo));

});

Route::get('/mailWaste', function () {

    $user = Auth::user();

    $wastesilo = Hisfa\WasteSilo::first();

    $user->notify(new WasteSiloFull($wastesilo));

});

// Login, reset account, ...
Auth::routes();

