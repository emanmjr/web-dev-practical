<?php

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

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['as' => 'dashboard.'], function(){

	Route::prefix('users/roles')->group(function () {
	    Route::get('/', 'RolesController@index')->name('users.roles.index');
		Route::post('store', 'RolesController@store')->name('users.roles.store');
		Route::patch('update', 'RolesController@update')->name('users.roles.update');
		Route::delete('delete', 'RolesController@destroy')->name('users.roles.destroy');
	});

	Route::prefix('users')->group(function () {
	    Route::get('/', 'UsersController@index')->name('users.index');
		Route::post('store', 'UsersController@store')->name('users.store');
		Route::patch('update', 'UsersController@update')->name('users.update');
		Route::delete('delete', 'UsersController@destroy')->name('users.destroy');
	});
	
});
