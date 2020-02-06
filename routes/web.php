<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register', function () {
    return redirect()->back();
});

Route::resource('/companies', 'CompanyController');

Route::get('/home', 'HomeController@index')->name('home');
