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

Route::group(['middleware' => 'auth'],function(){

    Route::get('/', 'SiteController@index')->name('home');
    Route::get('/profile','SiteController@profile')->name('profile');

    Route::get('books','BookController@index')->name('books');
    Route::post('books','BookController@add')->name('book.add');
    Route::get('book/{id}','BookController@view');
    Route::get('book/info/{id}','BookController@bookInfo');
    Route::post('/book/edit','BookController@editBook')->name('book.edit');
});
