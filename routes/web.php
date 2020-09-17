<?php
Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AuthController@dashboard')->name('admin');
Route::get('/admin/login','AuthController@showLoginform')->name('admin.login');
Route::get('/admin/logout','AuthController@logout')->name('admin.logout');
Route::post('/admin/login/do', 'AuthController@login')->name('admin.login.do');
