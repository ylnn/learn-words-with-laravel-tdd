<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/word/create', 'Front\WordController@create')->name('word.create');
Route::post('/word/store', 'Front\WordController@store')->name('word.store');
Route::get('/word/delete/{id}', 'Front\WordController@delete')->name('word.delete');
