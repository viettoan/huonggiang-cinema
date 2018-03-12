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

    Route::resource('promotion', 'PromotionController');
    Route::get('/promotion/delete/{id}', 'PromotionController@destroy');

    Route::resource('time', 'TimeController');
    Route::get('/time/delete/{id}', 'TimeController@destroy');

    Route::resource('schedule', 'ScheduleController');
    Route::get('/create-schedule', 'ScheduleController@store');
    Route::get('/schedule/delete/{id}', 'ScheduleController@destroy');
    Route::get('/get-movie', 'ScheduleController@getMovie');
    Route::get('/get-time', 'ScheduleController@getTime');
    Route::get('/get-time-ui', 'ScheduleController@getTimeUi');
    Route::get('/get-schedules', 'ScheduleController@getSchedules');
    Route::get('/store-schedule-time', 'ScheduleController@storeScheduleTime');
    Route::get('/remove-schedule-time', 'ScheduleController@removeScheduleTime');
});

Route::group(['middleware' => 'localization', 'namespace' => 'Sites'], function() {
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/lich-chieu', 'ScheduleController@index')->name('schedules');

    Route::get('/he-thong-rap', 'CinemaController@index')->name('cinemas');

    Route::get('/movies/{id}', 'MovieController@show')->name('movie');
    
    Route::get('/cinemas/{id}', 'CinemaController@show')->name('cinema');

    Route::get('/promotion/{id}', 'PromotionController@show')->name('promotion');

    Route::get('/khuyen-mai', 'PromotionController@index')->name('promotions');

    Route::get('/post/{id}', 'PostController@show')->name('post');
    Route::get('/dich-vu-quang-cao', 'PostController@showAdvertisement')->name('advertisement');
    Route::get('/tuyen-dung', 'PostController@showRecruitment')->name('recruitment');
});

Auth::routes();

Route::get('/localization/{lang}', 'LanguageLocallizationController@index')->name('localization');
