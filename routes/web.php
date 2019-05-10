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

// Route::get('/', function () {
	
//     return view('dashboard/index');
// });

Route::get('/', 'Dashboard@index')->name('dashboard');
//Route::get('/', 'ReportsController@index');
Route::get('/reports','Reports@index');
Route::get('/customers','Customers@index');
Route::get('/users','Users@index');
Route::get('/location','Location@index');

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function(){
	return view('register');
});
Route::get('/add_report', function(){
	return view('reports/add_report');
});
Route::get('/reports/view_report', function(){
	return view('reports/view_report');
});
Route::get('/add_customer', function(){
	return view('customer/add_customer');
});
Route::get('/add_user', function(){
	return view('users/add_user');
});
Route::get('/add_location', function(){
	return view('location/add_location');
});