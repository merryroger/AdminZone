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


Route::get('/emails', 'EmailController@index')->name('emails');
Route::get('/feedback', 'EmailController@create')->name('feedback.get');
Route::post('/feedback', 'EmailController@store')->name('feedback.send');

Route::namespace('Auth')->group(function () {
    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout')->name('logout');
    Route::get('/', 'AuthController@index')->name('rootpage');
});
