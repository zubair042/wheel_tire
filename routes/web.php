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
Route::get('/location','Location@index');

Route::get('/accounts','Accounts@index');
Route::get('/account/add','Accounts@create');
Route::get('/account/edit/{id}','Accounts@edit');
Route::post('/account/edit/{id}','Accounts@update');

Route::get('/reports/view_report/{id}', function(){
	return view('reports/view_report');
});
// Route::get('/add_account', function(){
// 	return view('accounts/add_account');
// });
Route::get('/user/add', function(){
	return view('users/add_user');
});
Route::get('/location/add', function(){
	return view('location/add_location');
});
Route::get('/edit_location', function(){
	return view('location/edit_location');
});
Route::get('/edit_user', function(){
	return view('users/edit_user');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
