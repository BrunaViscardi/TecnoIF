<?php
Route::get('/', function () {
    return view('home/index');
});

Auth::routes();


Route::get('/editais/', 'EditalController@index')->name('editais.index');
Route::get('/editais/update/{id}', 'EditalController@update')->name('editais.update');
Route::get('/editais/updateView/{id}', 'EditalController@updateView')->name('editais.updateView');
Route::get('/editais/updateSituacaoView/{id}', 'EditalController@updateSituacaoView')->name('editais.updateSituacaoView');
Route::post('/editais/updateSituacao/{id}', 'EditalController@updateSituacao')->name('editais.updateSituacao');
Route::get('/editais/createView', 'EditalController@createView')->name('editais.createView');
Route::post('/editais/create', 'EditalController@create')->name('editais.create');
Route::get('/editais/filtro', 'EditalController@filtro')->name('editais.filtro');
Route::get('/editais/filtrodata', 'EditalController@filtrodata')->name('editais.filtrodata');


Route::get('/gestores/', 'GestoresController@index')->name('gestores.index');
Route::get('/gestores/destroy/{email}', 'GestoresController@destroy')->name('gestores.destroy');
Route::get('/gestores/createView', 'GestoresController@createView')->name('gestores.createView');
Route::post('/gestores/create', 'GestoresController@create')->name('gestores.create');
Route::get('/gestores/filtro', 'GestoresController@filtro')->name('gestores.filtro');
Route::get('/gestores/updateView/{id}', 'GestoresController@updateView')->name('gestores.updateView');
Route::post('/gestores/update/{id}', 'GestoresController@update')->name('gestores.update');

Route::get('/projetos/', 'ProjetoController@index')->name('projetos.index');
Route::get('/projetos/show/{id}', 'ProjetoController@show')->name('projetos.show');
Route::get('/projetos/updateAprovacao/{id}', 'ProjetoController@updateAprovacao')->name('projetos.updateAprovacao');
Route::get('/projetos/updateRejeicaoView/{id}', 'ProjetoController@updateRejeicaoView')->name('projetos.updateRejeicaoView');
Route::post('/projetos/updateRejeicao/{id}', 'ProjetoController@updateRejeicao')->name('projetos.updateRejeicao');
Route::get('/projetos/filtro', 'ProjetoController@filtro')->name('projetos.filtro');
Route::get('/projetos/filtroSituacao', 'ProjetoController@filtroSituacao')->name('projetos.filtroSituacao');
Route::get('/projetos/painel', 'ProjetoController@painel')->name('projetos.painel');
Route::get('/projetos/showEquipe/{id}', 'ProjetoController@showEquipe')->name('projetos.showEquipe');
Route::get('/projetos/showParticipante/{id}', 'ProjetoController@showParticipante')->name('projetos.showParticipante');
Route::get('/projetos/createEquipeView/{id}', 'ProjetoController@createEquipeView')->name('projetos.createEquipeView');
Route::post('/projetos/createEquipe/{id}', 'ProjetoController@createEquipe')->name('projetos.createEquipe');
Route::get('/projetos/showParticipante/{id}', 'ProjetoController@showParticipante')->name('projetos.showParticipante');
Route::get('/projetos/updateParticipanteView/{id}', 'ProjetoController@updateParticipanteView')->name('projetos.updateParticipanteView');
Route::put('/projetos/updateParticipante/{id}', 'ProjetoController@updateParticipante')->name('projetos.updateParticipante');
Route::get('/projetos/destroyParticipante/{id}', 'ProjetoController@destroyParticipante')->name('projetos.destroyParticipante');
Route::get('/projetos/export', 'ProjetoController@export')->name('projetos.export');
Route::get('/projetos/createView/{id}', 'ProjetoController@createView')->name('projetos.createView');
Route::post('/projetos/create', 'ProjetoController@create')->name('projetos.create');
Route::put('/projetos/updateCadastroView/{id}', 'ProjetoController@updateCadastroView')->name('projetos.updateCadastroView');
Route::post('/projetos/updateCadastro/{id}', 'ProjetoController@updateCadastro')->name('projetos.updateCadastro');

Route::get('/configuracoes/updateSenha', 'ConfiguracaoController@updateSenha')->name('configuracoes.updateSenha');
Route::get('/configuracoes/updatePerfilView', 'ConfiguracaoController@updatePerfilView')->name('configuracoes.updatePerfilView');
Route::put('/configuracoes/updatePerfil', 'ConfiguracaoController@updatePerfil')->name('configuracoes.updatePerfil');



Route::get('/home/cadastro', 'Home\CandidatoController@create')->name('home.cadastro');
Route::post('/home/store', 'Home\CandidatoController@store')->name('home.store');

Route::get('/painel/login', 'PainelController@showLoginform')->name('painel.login');
Route::get('/painel/logout', 'PainelController@logout')->name('painel.logout');
Route::post('/painel/login/do', 'PainelController@login')->name('painel.login.do');



Route::get('/painel/home', 'PainelController@dashboard')->name('painel.home');
