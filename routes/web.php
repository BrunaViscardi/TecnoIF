<?php
Route::get('/', function () {
    return view('index');
});
Route::get('/cadastro','cadastroController@formCadastro')->name('cadastro');
Route::post('/debug','cadastroController@debug')->name('debug');

Auth::routes();

Route::get('/admin','AuthController@dashboard')->name('admin');
Route::get('/admin/login','AuthController@showLoginform')->name('admin.login');
Route::get('/admin/logout','AuthController@logout')->name('admin.logout');
Route::post('/admin/login/do', 'AuthController@login')->name('admin.login.do');

Route::get('/home', 'HomeController@index')->name('home');
