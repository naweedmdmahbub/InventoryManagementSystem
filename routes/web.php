<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::post('/users/delete/{id}', 'UserController@delete')->name('users.delete');
    Route::resource('roles', 'RoleController');
    Route::post('/roles/delete/{id}', 'RoleController@delete')->name('roles.delete');
    Route::get('/roles/check_users/{id}', 'RoleController@checkUsers')->name('roles.checkUsers');
    Route::resource('suppliers', 'SupplierController');
    Route::post('/suppliers/delete/{id}', 'SupplierController@delete')->name('suppliers.delete');
    Route::resource('categories', 'CategoryController');
    Route::post('/categories/delete/{id}', 'CategoryController@delete')->name('categories.delete');
    Route::resource('units', 'UnitController');
    Route::post('/units/delete/{id}', 'UnitController@delete')->name('units.delete');
    Route::resource('materials', 'MaterialController');
    Route::post('/materials/delete/{id}', 'MaterialController@delete')->name('materials.delete');
    Route::resource('projects', 'ProjectController');
    Route::post('/projects/delete/{id}', 'ProjectController@delete')->name('projects.delete');
    Route::resource('structures', 'StructureController');
    Route::post('/structures/delete/{id}', 'StructureController@delete')->name('structures.delete');
    Route::resource('works', 'WorkController');
    Route::post('/works/delete/{id}', 'WorkController@delete')->name('works.delete');

    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/manpowers', 'ManpowerController@index')->name('manpowers.index');
    // Route::resource('orders', 'OrderController');
    // Route::post('/orders/delete/{id}', 'OrderController@delete')->name('orders.delete');

    Route::resource('project_users', 'ProjectUserController');
    Route::post('/project_users/delete/{id}', 'ProjectUserController@delete')->name('project_user.delete');

});

//Route::resource('users', 'UserController')->middleware('web');
//Route::post('/users/delete/{id}', 'UserController@delete')->middleware('web');

Route::get('/dashboard','HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
