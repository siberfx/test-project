<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register', function () {
    return redirect()->back();
});

Route::get('/home', 'HomeController@index')->name('home');
