<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register', function () {
    return redirect()->back();
});

Route::resource('/companies', 'CompanyController');

Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
    Route::get('/', 'ContactController@index')->name('index');
    Route::get('/create', 'ContactController@create')->name('create');
    Route::post('/create', 'ContactController@store')->name('store');
    Route::get('/{contact}/edit', 'ContactController@edit')->name('edit');
});

Route::get('/home', 'HomeController@index')->name('home');
