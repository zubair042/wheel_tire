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
Route::get('/add_report','Reports@create');
Route::post('/add_report','Reports@store')->name('save_reports');
Route::get('/accounts','Accounts@index');
Route::get('/add_account','Accounts@create');
Route::post('/add_account','Accounts@store')->name('save_accounts');
Route::get('/users','Users@index');
Route::get('/location','Location@index');

Route::get('/reports/view_report/{id}', function(){
	return view('reports/view_report');
});
// Route::get('/add_account', function(){
// 	return view('accounts/add_account');
// });
Route::get('/add_user', function(){
	return view('users/add_user');
});
Route::get('/add_location', function(){
	return view('location/add_location');
});
Route::get('/edit_location', function(){
	return view('location/edit_location');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
