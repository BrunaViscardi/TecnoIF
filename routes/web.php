<?php
Route::get('/', function () {
    return view('home/index');
});

Auth::routes();
Route::get('/home/cadastro', 'CandidatoController@formCadastro')->name('home.cadastro');
Route::post('/home/debug', 'CandidatoController@debug')->name('home.debug');
Route::post('/home/valida', 'CandidatoController@valida')->name('home.valida');
Route::post('/painel/enviar', 'Painel\ProjetoController@debug')->name('painel.enviar');
Route::get('painel/mentorado/cadastro', 'Painel\ProjetoController@cadastro')->name('painel.mentorado.cadastro');


Route::get('painel/acompanhar', 'Painel\ProjetoController@acompanhar')->name('painel.acompanhar');
Route::get('painel/mentorado/editais', 'Painel\ProjetoController@editais')->name('painel.mentorado.editais');
Route::get('painel/mentorado/editar', 'Painel\ProjetoController@editar')->name('painel.mentorado.editar');
Route::get('/painel/home', 'Painel\PainelController@dashboard')->name('painel.home');
Route::get('/painel/mentorado/gerenciarProjeto', 'Painel\ProjetoController@index')->name('painel.mentorado.gerenciarProjeto');
Route::get('/painel/mentorado/dashboard', 'Painel\PainelController@candidato')->name('painel.mentorado.dashboard');
Route::get('/painel/login', 'Painel\PainelController@showLoginform')->name('painel.login');
Route::get('/painel/logout', 'Painel\PainelController@logout')->name('painel.logout');
Route::post('/painel/login/do', 'Painel\PainelController@login')->name('painel.login.do');


