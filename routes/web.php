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

	Route::group(['middleware' => 'user.can.access'], function(){


	    Route::prefix('users/roles')->group(function () {
		    Route::get('/', 'RoleController@index')->name('users.roles.index');
			Route::post('store', 'RoleController@store')->name('users.roles.store');
			Route::patch('update', 'RoleController@update')->name('users.roles.update');
			Route::delete('delete', 'RoleController@destroy')->name('users.roles.destroy');
		});

		Route::prefix('users')->group(function () {
		    Route::get('/', 'UserController@index')->name('users.index');
			Route::post('store', 'UserController@store')->name('users.store');
			Route::patch('update', 'UserController@update')->name('users.update');
			Route::delete('delete', 'UserController@destroy')->name('users.destroy');
		});

		Route::prefix('expenses/category')->group(function () {
		    Route::get('/', 'ExpenseCategoryController@index')->name('expense.category.index');
			Route::post('store', 'ExpenseCategoryController@store')->name('expense.category.store');
			Route::patch('update', 'ExpenseCategoryController@update')->name('expense.category.update');
			Route::delete('delete', 'ExpenseCategoryController@destroy')->name('expense.category.destroy');
		});
	});
	

	Route::prefix('expenses')->group(function () {
	    Route::get('/', 'ExpenseController@index')->name('expense.index');
		Route::post('store', 'ExpenseController@store')->name('expense.store');
		Route::patch('update', 'ExpenseController@update')->name('expense.update');
		Route::delete('delete', 'ExpenseController@destroy')->name('expense.destroy');
	});
	
});
