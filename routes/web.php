<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout');
Route::get('contact_us','SiteController@contact_us');
Route::group(['middleware' => 'auth'],function(){

    Route::get('/', 'SiteController@index')->name('home');
    Route::get('/profile','SiteController@profile')->name('profile');
});
