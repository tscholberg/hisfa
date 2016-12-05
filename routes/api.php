<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(array('prefix' => '/v1'), function () {
    Route::resource('primesilos', 'api\v1\PrimeSiloController');
    Route::resource('wastesilos', 'api\v1\WasteSiloController');
});