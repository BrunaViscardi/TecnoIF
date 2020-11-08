<?php
Route::get('/', function () {
    return view('home/home');
});

Auth::routes();
Route::get('/home/cadastro', 'candidatoController@formCadastro')->name('home.cadastro');
Route::post('/home/debug', 'candidatoController@debug')->name('home.debug');
Route::post('/home/valida', 'candidatoController@valida')->name('home.valida');
Route::post('/painel/enviar', 'painel\ProjetoController@debug')->name('painel.enviar');
Route::get('painel/mentorado/cadastro', 'painel\ProjetoController@cadastro')->name('painel.mentorado.cadastro');


Route::get('painel/acompanhar', 'painel\ProjetoController@acompanhar')->name('painel.acompanhar');
Route::get('painel/mentorado/editais', 'painel\ProjetoController@editais')->name('painel.mentorado.editais');
Route::get('painel/mentorado/editar', 'painel\ProjetoController@editar')->name('painel.mentorado.editar');
Route::get('/painel/home', 'painel\PainelController@dashboard')->name('painel.home');
Route::get('/painel/mentorado/gerenciarProjeto', 'painel\ProjetoController@index')->name('painel.mentorado.gerenciarProjeto');
Route::get('/painel/mentorado/dashboard', 'painel\PainelController@candidato')->name('painel.mentorado.dashboard');
Route::get('/painel/login', 'painel\PainelController@showLoginform')->name('painel.login');
Route::get('/painel/logout', 'painel\PainelController@logout')->name('painel.logout');
Route::post('/painel/login/do', 'painel\PainelController@login')->name('painel.login.do');


