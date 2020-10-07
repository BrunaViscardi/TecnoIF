<?php
Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/auth/cadastro','candidatoController@formCadastro')->name('auth.cadastro');
Route::post('/auth/debug','candidatoController@debug')->name('auth.debug');
Route::post('/auth/valida','candidatoController@valida')->name('auth.valida');

Route::get('/Painel','AuthController@dashboard')->name('Painel');
Route::get('/Painel/login','AuthController@showLoginform')->name('Painel.login');
Route::get('/Painel/logout','AuthController@logout')->name('Painel.logout');
Route::post('/Painel/login/do', 'AuthController@login')->name('Painel.login.do');


