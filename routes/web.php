<?php
Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/auth/cadastro','candidatoController@formCadastro')->name('auth.cadastro');
Route::post('/auth/debug','candidatoController@debug')->name('auth.debug');
Route::post('/auth/valida','candidatoController@valida')->name('auth.valida');
Route::get('/Painel/Home','Painel\PainelController@dashboard')->name('Painel.Home');
Route::get('/Painel/gerenciarProjeto','Painel\PainelController@gerenciarProjeto')->name('Painel.gerenciarProjeto');
Route::get('/Painel/PainelCandidato/Candidato','Painel\PainelController@candidato')->name('Painel.PainelCandidato.Candidato');
Route::get('/Painel/login','Painel\PainelController@showLoginform')->name('Painel.login');
Route::get('/Painel/logout','Painel\PainelController@logout')->name('Painel.logout');
Route::post('/Painel/login/do', 'Painel\PainelController@login')->name('Painel.login.do');


