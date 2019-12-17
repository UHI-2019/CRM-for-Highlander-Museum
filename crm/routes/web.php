<?php

use Illuminate\Auth\Middleware\Authenticate;

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

Route::get('/', function(){
    return redirect('/home');
});
Route::get('/home', 'HomeController@index')->name('home');

// default auth routes
Auth::routes();

// customer auth routes - for superuser, etc
Route::get('/admin/create', 'Auth\RegisterController@showAdminRegistrationForm')->middleware('superuser');