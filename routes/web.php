<?php

Route::get('/', 'IndexController@index');


Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
