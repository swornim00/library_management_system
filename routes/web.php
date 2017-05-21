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

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('contact_us', 'SiteController@contact_us');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/search/books/byName','SearchController@searchBooks');

    Route::get('/', 'SiteController@index')->name('home');
    Route::get('/profile', 'SiteController@profile')->name('profile');

    Route::get('books', 'BookController@index')->name('books');
    Route::post('books', 'BookController@add')->name('book.add');
    Route::get('book/{id}', 'BookController@view');
    Route::get('book/info/{id}', 'BookController@bookInfo');
    Route::post('book/edit', 'BookController@editBook')->name('book.edit');
    Route::get('book/edit/{id}', 'BookController@editBookView');

    Route::get('borrowers', 'BorrowersController@index')->name('borrowers');
    Route::post('borrowers', 'BorrowersController@add')->name('borrowers.add');

    Route::get('borrows', 'BorrowController@index');
    Route::get('lend', 'BorrowController@lendView');
    Route::post('lend', 'BorrowController@lend');
    Route::post('borrow/clear/{id}', 'BorrowController@clear');
    Route::post('borrow/unclear/{id}', 'BorrowController@unclear');
    Route::post('borrow/lost/{id}', 'BorrowController@lost');
    Route::post('borrow/rev_loss/{id}', 'BorrowController@rev_loss');

    Route::get('settings', 'SiteController@settings')->name('settings');
    Route::post('settings', 'SiteController@settings_update')->name('settings.update');
    Route::post('/reset_all', 'SiteController@reset_all')->name('settings.reset_all');

    Route::get('/modal/delete/{db}/{id}', 'SiteController@delete');
    Route::post('delete/', 'SiteController@deleteDo')->name('delete');


});
