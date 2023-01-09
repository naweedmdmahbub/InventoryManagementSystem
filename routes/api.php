<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::namespace('Api')->group(function() {
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::apiResource('orders', 'OrderController');
        Route::get('/projects', 'ProjectController@index')->name('projectsApi.index');
        Route::get('/project/{id}', 'ProjectController@show')->name('projectsApi.show');
        Route::get('/suppliers', 'SupplierController@index')->name('suppliersApi.index');
        Route::get('/supplier/{id}', 'SupplierController@show')->name('suppliersApi.show');
        Route::get('/units', 'UnitController@index')->name('unitsApi.index');
        Route::get('/unit/{id}', 'UnitController@show')->name('unitsApiApi.show');
        Route::get('/materials', 'MaterialController@index')->name('materialsApi.index');
        Route::get('/material/{id}', 'MaterialController@show')->name('materialsApi.show');
    });
});