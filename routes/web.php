<?php

Route::get('/', 'IndexController@index');
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
/*
Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
*/
