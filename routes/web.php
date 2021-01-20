<?php
Route::get('/', function () {
    return view('home/index');
});

Auth::routes();


Route::get('/editais/index', 'EditalController@index')->name('editais.index');
Route::post('/editais/update/{id}', 'EditalController@update')->name('editais.update');
Route::put('/editais/updateView/{id}', 'EditalController@updateView')->name('editais.updateView');
Route::get('/editais/updateSituacaoView/{id}', 'EditalController@updateSituacaoView')->name('editais.updateSituacaoView');
Route::post('/editais/updateSituacao/{id}', 'EditalController@updateSituacao')->name('editais.updateSituacao');
Route::get('/editais/createView', 'EditalController@createView')->name('editais.createView');
Route::post('/editais/create', 'EditalController@create')->name('editais.create');
Route::get('/editais/filtro', 'EditalController@filtro')->name('editais.filtro');

Route::get('/gestores/index', 'GestoresController@index')->name('gestores.index');
Route::get('/gestores/destroy/{email}', 'GestoresController@destroy')->name('gestores.destroy');
Route::get('/gestores/createView', 'GestoresController@createView')->name('gestores.createView');
Route::post('/gestores/create', 'GestoresController@create')->name('gestores.create');
Route::get('/gestores/filtro', 'GestoresController@filtro')->name('gestores.filtro');
Route::get('/gestores/updateView/{id}', 'GestoresController@updateView')->name('gestores.updateView');
Route::post('/gestores/update/{id}', 'GestoresController@update')->name('gestores.update');

Route::get('/projetos/index', 'ProjetoController@index')->name('projetos.index');
Route::put('/projetos/show/{id}', 'ProjetoController@show')->name('projetos.show');
Route::get('/projetos/updateAprovacao/{id}', 'ProjetoController@updateAprovacao')->name('projetos.updateAprovacao');
Route::get('/projetos/updateRejeicaoView/{id}', 'ProjetoController@updateRejeicaoView')->name('projetos.updateRejeicaoView');
Route::post('/projetos/updateRejeicao/{id}', 'ProjetoController@updateRejeicao')->name('projetos.updateRejeicao');
Route::get('/projetos/filtro', 'ProjetoController@filtro')->name('projetos.filtro');
Route::get('/projetos/painel', 'ProjetoController@painel')->name('projetos.painel');



Route::get('/configuracoes/updateSenha', 'ConfiguracaoController@updateSenha')->name('configuracoes.updateSenha');
Route::get('/configuracoes/updatePerfilView', 'ConfiguracaoController@updatePerfilView')->name('configuracoes.updatePerfilView');
Route::put('/configuracoes/updatePerfil', 'ConfiguracaoController@updatePerfil')->name('configuracoes.updatePerfil');



Route::get('/home/cadastro', 'Home\CandidatoController@create')->name('home.cadastro');
Route::post('/home/store', 'Home\CandidatoController@store')->name('home.store');
Route::post('/home/valida', 'CandidatoController@valida')->name('home.valida');



Route::get('/painel/home', 'Painel\PainelController@dashboard')->name('painel.home');
Route::get('/painel/login', 'Painel\PainelController@showLoginform')->name('painel.login');
Route::get('/painel/logout', 'Painel\PainelController@logout')->name('painel.logout');
Route::post('/painel/login/do', 'Painel\PainelController@login')->name('painel.login.do');

Route::get('/painel/coordenador/acompanharProjetos', 'Painel\CoordenadorController@acompanharProjetos')->name('painel.coordenador.acompanharProjetos');


Route::get('/painel/coordenador/cadastroGestores', 'Painel\CoordenadorController@cadastroGestores')->name('painel.coordenador.cadastroGestores');
Route::post('/painel/coordenador/create', 'Painel\CoordenadorController@create')->name('painel.coordenador.create');
Route::get('/painel/coordenador/cadastroEditais', 'Painel\CoordenadorController@cadastroEditais')->name('painel.coordenador.cadastroEditais');
Route::post('/painel/coordenador/createEditais', 'Painel\CoordenadorController@createEditais')->name('painel.coordenador.createEditais');

Route::get('/painel/coordenador/deleteEdital/{id}', 'Painel\CoordenadorController@deleteEdital')->name('painel.coordenador.deleteEdital');
Route::get('/painel/coordenador/alterarSenha', 'Painel\CoordenadorController@alterarSenha')->name('painel.coordenador.alterarSenha');
Route::put('/painel/coordenador/editarEdital/{id}', 'Painel\CoordenadorController@editarEdital')->name('painel.coordenador.editarEdital');
Route::post('/painel/coordenador/edicaoEdital/{id}', 'Painel\CoordenadorController@edicaoEdital')->name('painel.coordenador.edicaoEdital');
Route::get('/painel/coordenador/visualizarProjeto/{id}', 'Painel\CoordenadorController@visualizarProjeto')->name('painel.coordenador.visualizarProjeto');
Route::delete('/painel/coordenador/deletarProjeto/{id}', 'Painel\CoordenadorController@deletarProjeto')->name('painel.coordenador.deletarProjeto');
Route::get('/painel/coordenador/mudarSituacao/{id}', 'Painel\CoordenadorController@mudarSituacao')->name('painel.coordenador.mudarSituacao');
Route::get('/painel/coordenador/rejeitar/{id}', 'Painel\CoordenadorController@rejeitar')->name('painel.coordenador.rejeitar');
Route::get('/painel/coordenador/aprovar/{id}', 'Painel\CoordenadorController@aprovar')->name('painel.coordenador.aprovar');
Route::get('/painel/coordenador/filtrarGestores', 'Painel\CoordenadorController@filtrarGestores')->name('painel.coordenador.filtrarGestores');
Route::get('/painel/coordenador/filtrarProjetos', 'Painel\CoordenadorController@filtrarProjetos')->name('painel.coordenador.filtrarProjetos');
Route::get('/painel/coordenador/filtrarEditais', 'Painel\CoordenadorController@filtrarEditais')->name('painel.coordenador.filtrarEditais');
Route::post('/painel/coordenador/justificarCreate/{id}', 'Painel\CoordenadorController@justificarCreate')->name('painel.coordenador.justificarCreate');
Route::post('/painel/coordenador/editaSituacao/{id}', 'Painel\CoordenadorController@editaSituacao')->name('painel.coordenador.editaSituacao');
Route::get('/painel/coordenador/editarGestor/{id}', 'Painel\CoordenadorController@editarGestor')->name('painel.coordenador.editarGestor');
Route::post('/painel/coordenador/gestorUpdate/{id}', 'Painel\CoordenadorController@gestorUpdate')->name('painel.coordenador.gestorUpdate');




Route::get('/painel/equipe/acompanhar', 'Painel\GestorController@AcompanharProjetos')->name('painel.equipe.acompanhar');
Route::get('/painel/equipe/alterarSenha', 'Painel\GestorController@alterarSenha')->name('painel.equipe.alterarSenha');
Route::put('/painel/equipe/visualizarProjeto/{id}', 'Painel\GestorController@visualizarProjeto')->name('painel.equipe.visualizarProjeto');
Route::get('/painel/equipe/visualizarParticipante/{id}', 'Painel\GestorController@visualizarParticipante')->name('painel.equipe.visualizarParticipante');
Route::get('/painel/equipe/equipe/{id}', 'Painel\GestorController@equipe')->name('painel.equipe.equipe');
Route::get('/painel/equipe/aprovar/{id}', 'Painel\GestorController@aprovar')->name('painel.equipe.aprovar');
Route::get('/painel/equipe/rejeitar/{id}', 'Painel\GestorController@rejeitar')->name('painel.equipe.rejeitar');
Route::get('/painel/equipe/filtrar', 'Painel\GestorController@filtrar')->name('painel.equipe.filtrar');


Route::get('painel/mentorado/cadastro/{id}', 'Painel\MentoradoController@cadastro')->name('painel.mentorado.cadastro');
Route::put('painel/mentorado/cadastroEdit/{id}', 'Painel\MentoradoController@cadastroEdit')->name('painel.mentorado.cadastroEdit');

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
Route::get('/painel/mentorado/equipe/{id}', 'Painel\MentoradoController@equipe')->name('painel.mentorado.equipe');
Route::post('/painel/mentorado/createEquipe/{id}', 'Painel\MentoradoController@createEquipe')->name('painel.mentorado.createEquipe');
Route::get('painel/mentorado/cadastroEquipe/{id}', 'Painel\MentoradoController@cadastroEquipe')->name('painel.mentorado.cadastroEquipe');
Route::get('/painel/mentorado/deleteParticipante/{id}', 'Painel\MentoradoController@deleteParticipante')->name('painel.mentorado.deleteParticipante');
Route::get('/painel/mentorado/visualizarParticipante/{id}', 'Painel\MentoradoController@visualizarParticipante')->name('painel.mentorado.visualizarParticipante');
Route::put('/painel/mentorado/edicaoParticipante/{id}', 'Painel\MentoradoController@edicaoParticipante')->name('painel.mentorado.edicaoParticipante');
Route::get('/painel/mentorado/editarParticipante/{id}', 'Painel\MentoradoController@editarParticipante')->name('painel.mentorado.editarParticipante');
Route::get('/painel/mentorado/filtrarEditais', 'Painel\MentoradoController@filtrarEditais')->name('painel.mentorado.filtrarEditais');

Route::get('/painel/mentorado/visualizarProjeto/{id}', 'Painel\MentoradoController@visualizarProjeto')->name('painel.mentorado.visualizarProjeto');
Route::get('/painel/coordenador/export', 'Painel\CoordenadorController@export')->name('painel.coordenador.export');

