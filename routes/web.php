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
    Route::get('/search-user', 'UserController@search');

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

    Route::resource('time', 'TimeController');
    Route::get('/time/delete/{id}', 'TimeController@destroy');

    Route::resource('cinema_system', 'CinemaSystemController');
    Route::get('/cinema_system/delete/{id}', 'CinemaSystemController@destroy');

    Route::resource('schedule', 'ScheduleController');
    Route::get('/create-schedule', 'ScheduleController@store');
    Route::get('/schedule/delete/{id}', 'ScheduleController@destroy');
    Route::get('/get-movie', 'ScheduleController@getMovie');
    Route::get('/get-technology', 'ScheduleController@getTechnology');
    Route::get('/get-time', 'ScheduleController@getTime');
    Route::get('/get-time-ui', 'ScheduleController@getTimeUi');
    Route::get('/get-schedules', 'ScheduleController@getSchedules');
    Route::get('/store-schedule-time', 'ScheduleController@storeScheduleTime');
    Route::get('/remove-schedule-time', 'ScheduleController@removeScheduleTime');
    Route::get('/edit-schedule-time', 'ScheduleController@editScheduleTime');

    Route::get('/get-cinema-add-booking', 'MovieController@getCinema');
    Route::get('/store-booking-movie', 'MovieController@storeBookingMovie');

    Route::resource('technology', 'TechnologyController');
    Route::get('/technology/delete/{id}', "TechnologyController@destroy");

    Route::resource('trailer', 'TrailerController');
    Route::get('/trailer/delete/{id}', 'TrailerController@destroy');

    Route::resource('city', 'CityController');
    Route::get('/city/delete/{id}', 'CityController@destroy');

    Route::resource('/technology', 'TechnologyController');
    Route::get('/technology/delete/{id}', 'TechnologyController@destroy');
});

Route::group(['middleware' => 'localization', 'namespace' => 'Sites'], function() {
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/lich-chieu', 'ScheduleController@index')->name('schedules');
    Route::get('/get-cinemas', 'ScheduleController@getCinema');
    Route::get('/get-cinema-schedule', 'ScheduleController@getScheduleByCinema');
    Route::get('/get-movie-schedule', 'ScheduleController@getScheduleByMovie');
    Route::get('/get-dates', 'ScheduleController@getDate');

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
