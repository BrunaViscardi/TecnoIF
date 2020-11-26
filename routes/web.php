<?php
Route::get('/', function () {
    return view('home/index');
});

Auth::routes();

Route::get('/home/cadastro', 'Home\CandidatoController@create')->name('home.cadastro');
Route::post('/home/store', 'Home\CandidatoController@store')->name('home.store');
Route::post('/home/valida', 'CandidatoController@valida')->name('home.valida');

Route::post('/painel/enviar', 'Painel\ProjetoController@create')->name('painel.enviar');
Route::get('painel/mentorado/cadastro', 'Painel\ProjetoController@cadastro')->name('painel.mentorado.cadastro');
Route::get('/painel/home', 'Painel\PainelController@dashboard')->name('painel.home');
Route::get('/painel/login', 'Painel\PainelController@showLoginform')->name('painel.login');
Route::get('/painel/logout', 'Painel\PainelController@logout')->name('painel.logout');
Route::post('/painel/login/do', 'Painel\PainelController@login')->name('painel.login.do');

Route::get('/painel/coordenador/acompanharProjetos', 'Painel\CoordenadorController@acompanharProjetos')->name('painel.coordenador.acompanharProjetos');
Route::get('/painel/coordenador/editais', 'Painel\CoordenadorController@editais')->name('painel.coordenador.editais');
Route::get('/painel/coordenador/configuracoes', 'Painel\CoordenadorController@configuracoes')->name('painel.coordenador.configuracoes');
Route::get('/painel/coordenador/listaGestores', 'Painel\CoordenadorController@lista')->name('painel.coordenador.listaGestores');
Route::get('/painel/coordenador/cadastroGestores', 'Painel\CoordenadorController@cadastroGestores')->name('painel.coordenador.cadastroGestores');
Route::get('/painel/coordenador/enviar', 'Painel\CoordenadorController@create')->name('painel.coordenador.enviar');



Route::get('painel/mentorado/editar', 'Painel\MentoradoController@editar')->name('painel.mentorado.editar');
Route::get('painel/mentorado/editais', 'Painel\MentoradoController@editais')->name('painel.mentorado.editais');
Route::get('/painel/mentorado/configuracoes', 'Painel\MentoradoController@configuracoes')->name('painel.mentorado.configuracoes');
Route::get('/painel/mentorado/gerenciarProjeto', 'Painel\MentoradoController@gerenciarProjeto')->name('painel.mentorado.gerenciarProjeto');

