<?php
Route::get('/', function () {
    return view('home/index');
});

Auth::routes();

Route::get('/home/cadastro', 'Home\CandidatoController@create')->name('home.cadastro');
Route::post('/home/store', 'Home\CandidatoController@store')->name('home.store');
Route::post('/home/valida', 'CandidatoController@valida')->name('home.valida');



Route::get('/painel/home', 'Painel\PainelController@dashboard')->name('painel.home');
Route::get('/painel/login', 'Painel\PainelController@showLoginform')->name('painel.login');
Route::get('/painel/logout', 'Painel\PainelController@logout')->name('painel.logout');
Route::post('/painel/login/do', 'Painel\PainelController@login')->name('painel.login.do');

Route::get('/painel/coordenador/acompanharProjetos', 'Painel\CoordenadorController@acompanharProjetos')->name('painel.coordenador.acompanharProjetos');
Route::get('/painel/coordenador/editais', 'Painel\CoordenadorController@editais')->name('painel.coordenador.editais');
Route::get('/painel/coordenador/configuracoes', 'Painel\CoordenadorController@configuracoes')->name('painel.coordenador.configuracoes');
Route::get('/painel/coordenador/listaGestores', 'Painel\CoordenadorController@lista')->name('painel.coordenador.listaGestores');
Route::get('/painel/coordenador/cadastroGestores', 'Painel\CoordenadorController@cadastroGestores')->name('painel.coordenador.cadastroGestores');
Route::post('/painel/coordenador/create', 'Painel\CoordenadorController@create')->name('painel.coordenador.create');
Route::get('/painel/coordenador/cadastroEditais', 'Painel\CoordenadorController@cadastroEditais')->name('painel.coordenador.cadastroEditais');
Route::post('/painel/coordenador/createEditais', 'Painel\CoordenadorController@createEditais')->name('painel.coordenador.createEditais');
Route::delete('/painel/coordenador/deleteGestor/{email}', 'Painel\CoordenadorController@deleteGestor')->name('painel.coordenador.deleteGestor');
Route::get('/painel/coordenador/deleteEdital/{id}', 'Painel\CoordenadorController@deleteEdital')->name('painel.coordenador.deleteEdital');
Route::get('/painel/coordenador/alterarSenha', 'Painel\CoordenadorController@alterarSenha')->name('painel.coordenador.alterarSenha');
Route::put('/painel/coordenador/editarEdital/{id}', 'Painel\CoordenadorController@editarEdital')->name('painel.coordenador.editarEdital');
Route::put('/painel/coordenador/edicaoEdital/{id}', 'Painel\CoordenadorController@edicaoEdital')->name('painel.coordenador.edicaoEdital');
Route::get('/painel/coordenador/visualizarProjeto/{id}', 'Painel\CoordenadorController@visualizarProjeto')->name('painel.coordenador.visualizarProjeto');



Route::get('/painel/equipe/acompanhar', 'Painel\GestorController@AcompanharProjetos')->name('painel.equipe.acompanhar');
Route::get('/painel/equipe/alterarSenha', 'Painel\GestorController@alterarSenha')->name('painel.equipe.alterarSenha');
Route::put('/painel/equipe/visualizarProjeto/{id}', 'Painel\GestorController@visualizarProjeto')->name('painel.equipe.visualizarProjeto');


Route::get('painel/mentorado/cadastro/{id}', 'Painel\MentoradoController@cadastro')->name('painel.mentorado.cadastro');
Route::put('painel/mentorado/cadastroEdit/{id}', 'Painel\MentoradoController@cadastroEdit')->name('painel.mentorado.cadastroEdit');
Route::post('painel/mentorado/cadastroEquipe', 'Painel\MentoradoController@cadastroEquipe')->name('painel.mentorado.cadastroEquipe');
Route::get('painel/mentorado/editais', 'Painel\MentoradoController@editais')->name('painel.mentorado.editais');
Route::get('/painel/mentorado/configuracoes', 'Painel\MentoradoController@configuracoes')->name('painel.mentorado.configuracoes');
Route::get('/painel/mentorado/gerenciarProjeto', 'Painel\MentoradoController@gerenciarProjeto')->name('painel.mentorado.gerenciarProjeto');
Route::get('/painel/mentorado/dashboard', 'Painel\MentoradoController@dashboard')->name('painel.mentorado.dashboard');
Route::post('/painel/mentorado/enviar', 'Painel\MentoradoController@create')->name('painel.mentorado.enviar');
Route::put('/painel/mentorado/editar/{id}', 'Painel\MentoradoController@editar')->name('painel.mentorado.editar');
Route::get('/painel/mentorado/alterarSenha', 'Painel\MentoradoController@alterarSenha')->name('painel.mentorado.alterarSenha');
Route::put('/painel/mentorado/alteracao', 'Painel\MentoradoController@alteracao')->name('painel.mentorado.alteracao');
Route::get('/painel/mentorado/alterarPerfil', 'Painel\MentoradoController@alterarPerfil')->name('painel.mentorado.alterarPerfil');
Route::put('/painel/mentorado/alteracaoPerfil', 'Painel\MentoradoController@alteracaoPerfil')->name('painel.mentorado.alteracaoPerfil');

Route::get('/painel/mentorado/visualizarProjeto/{id}', 'Painel\MentoradoController@visualizarProjeto')->name('painel.mentorado.visualizarProjeto');


