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
Route::get('/login-admin', function () {
    return view('admin.auth.login');
});
Route::post('/login-admin', 'Admin\Auth\LoginController@login')->name('login-admin');
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');
    Route::resource('user', 'UserController');
    Route::resource('cinema', 'CinemaController');
    Route::resource('movie', 'MovieController');
    Route::resource('category', 'CategoryController');
    Route::resource('type', 'UserController');
    Route::resource('media', 'UserController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
