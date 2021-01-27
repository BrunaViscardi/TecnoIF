
@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Cadastro de Projeto</h3>
            </div>
            <form action="{{route('projetos.updateCadastro', $projetos->id)}}" method="post">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome do Projeto</label>
                        <input name="nome_projeto" class="form-control" placeholder="Nome do Projeto" value="{{$projetos->nome_projeto}}">
                    </div>
                    <div class="form-group">
                        <label>Campus</label>
                        <select class="form-control" name="campus" >
                            <option value="{{$projetos->campus}}">{{$projetos->campus}}</option>
                            <option value="Aquidauana">Aquidauana</option>
                            <option value="Campo Grande"> Campo Grande</option>
                            <option value="Corumbá">Corumbá</option>
                            <option value="Coxim">Coxim</option>
                            <option value="Dourados">Dourados</option>
                            <option value="Jardim">Jardim</option>
                            <option value="Naviraí">Naviraí</option>
                            <option value="Nova Andradina"> Nova Andradina</option>
                            <option value="Três Lagoas">Três Lagoas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Área</label>
                        <select class="form-control" name="area">
                            <option value="{{$projetos->area}}">{{$projetos->area}}</option>
                            <option value="Ciências Agrárias"> Ciências Agrárias</option>
                            <option value="Exatas"> Exatas</option>
                            <option value="Meio Ambiente"> Meio Ambiente</option>
                            <option value="Saúde"> Saúde</option>
                            <option value="Tecnologia"> Tecnologia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quais os problemas / necessidades a sua solução pretende resolver?</label>
                        <textarea  name="problemas" class="form-control" rows="3" placeholder="..."  required >{{$projetos->problemas}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Quais as características da sua solução? Quais são seus diferenciais?</label>
                        <textarea name="caracteristicas" class="form-control" rows="3" placeholder="..." required>{{$projetos->caracteristicas}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Quem é o seu público alvo?</label>
                        <textarea name="publico_alvo" class="form-control" rows="3" placeholder="..." required>{{$projetos->publico_alvo}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Quais são as dificuldades e necessidades para realizar a ideia?</label>
                        <textarea name="dificuldades" class="form-control" rows="3" placeholder="..." required>{{$projetos->dificuldades}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Qual a tua disponibilidade e motivação para desenvolver o projeto?</label>
                        <textarea name="disponibilidade" class="form-control" rows="3" placeholder="..." required>{{$projetos->disponibilidade}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Quais são os resultados esperados?</label>
                        <textarea name="resultados" class="form-control" rows="3" placeholder="..." required>{{$projetos->resultados}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Indicação do pesquisador / mentor</label>
                        <input value="{{$projetos->nomeMentor}}" name="nomeMentor" class="form-control" placeholder="Nome do mentor" required>
                        <small class="form-text text-muted">Insira o nome completo</small>
                    </div>
                    <div class="form-group">
                        <label>Instituição</label>
                        <input value="{{$projetos->instituicao}}" name="instituicao" class="form-control" placeholder="Instituição" required>
                        <small class="form-text text-muted">Insira a instituição em que seu mentor trabalha</small>
                    </div>
                    <div class="form-group">
                        <label>Área </label>
                        <input value="{{$projetos->areaMentor}}" name="areaMentor" class="form-control" placeholder="Área de atuação" required>
                        <small class="form-text text-muted">Insira a área de atuação do seu mentor</small>
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input value="{{$projetos->email}}" name="email" class="form-control" placeholder="Email" required>
                        <small class="form-text text-muted">Insira o email do seu mentor</small>
                    </div>
                    <div class="form-group">
                        <label>Telefone </label>
                        <input value="{{$projetos->telefone}}" name="telefone" class="form-control" placeholder="Telefone" required>
                        <small class="form-text text-muted">Insira o telefone do seu mentor</small>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </section>
@endsection


