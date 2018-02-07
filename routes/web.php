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
    Route::get('/user/delete/{id}', 'UserController@destroy');

    Route::resource('cinema', 'CinemaController');
    Route::get('/cinema/delete/{id}', 'CinemaController@destroy');

    Route::resource('movie', 'MovieController');
    Route::get('/movie/delete/{id}', 'MovieController@destroy');

    Route::resource('media', 'MediaController');
    Route::get('/media/delete/{id}', 'MediaController@destroy');

    Route::resource('type', 'TypeController');
    Route::get('/type/delete/{id}', 'TypeController@destroy');

    Route::resource('post', 'PostController');
    Route::get('/post/delete/{id}', 'PostController@destroy');

    Route::resource('promotion', 'PromotionController');
    Route::get('/promotion/delete/{id}', 'PromotionController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
