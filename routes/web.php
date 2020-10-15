<?php
Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/auth/cadastro', 'candidatoController@formCadastro')->name('auth.cadastro');
Route::post('/auth/debug', 'candidatoController@debug')->name('auth.debug');
Route::post('/auth/valida', 'candidatoController@valida')->name('auth.valida');
Route::post('/Painel/enviar', 'Painel\ProjetoController@debug')->name('Painel.enviar');
Route::get('Painel/PainelCandidato/cadastro', 'Painel\ProjetoController@cadastro')->name('Painel.PainelCandidato.cadastro');


Route::get('Painel/acompanhar', 'Painel\ProjetoController@acompanhar')->name('Painel.acompanhar');
Route::get('Painel/PainelCandidato/editais', 'Painel\ProjetoController@editais')->name('Painel.PainelCandidato.editais');
Route::get('Painel/PainelCandidato/editar', 'Painel\ProjetoController@editar')->name('Painel.PainelCandidato.editar');
Route::get('/Painel/Home', 'Painel\PainelController@dashboard')->name('Painel.Home');
Route::get('/Painel/gerenciarProjeto', 'Painel\ProjetoController@index')->name('Painel.gerenciarProjeto');
Route::get('/Painel/PainelCandidato/Candidato', 'Painel\PainelController@candidato')->name('Painel.PainelCandidato.Candidato');
Route::get('/Painel/login', 'Painel\PainelController@showLoginform')->name('Painel.login');
Route::get('/Painel/logout', 'Painel\PainelController@logout')->name('Painel.logout');
Route::post('/Painel/login/do', 'Painel\PainelController@login')->name('Painel.login.do');


