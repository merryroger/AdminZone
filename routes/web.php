<?php

Route::get('/emails', 'EmailController@index')->name('emails');

Route::post('/feedback', 'EmailController@store')->name('feedback.send');

Route::namespace('Auth')->group(function () {
    Route::get('/', 'AuthController@index')->name('rootpage');
    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout')->name('logout');

});
