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

Route::get('/', 'Dashboard@index')->name('dashboard');
Route::get('/reports','Reports@index');
Route::get('/report/add','Reports@create');
Route::post('/add_report','Reports@store')->name('save_reports');
Route::post('/add_account','Accounts@store')->name('save_accounts');
Route::get('/users','Users@index');
Route::get('/location','Locations@index');


Route::get('/accounts','Accounts@index');
Route::get('/account/add','Accounts@create');

Route::get('/location/add','Locations@create');
Route::post('/location/add','Locations@store')->name('save_location');

Route::get('/account/edit/{id}','Accounts@edit');
Route::post('/account/edit/{id}','Accounts@update');

Route::get('/location/edit/{id}','Locations@edit');
Route::post('location/edit/{id}','Locations@update');
//Route::post('location/destroy/{id}','Locations@destroy');


Route::get('/reports/view_report/{id}', function(){
	return view('reports/view_report');
});

Route::get('/user/add', function(){
	return view('users/add_user');
});

Route::get('/edit_user', function(){
	return view('users/edit_user');
});
Auth::routes();

