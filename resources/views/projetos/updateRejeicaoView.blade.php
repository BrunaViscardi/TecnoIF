
@extends('painel.layout.index')

@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Dados do Projeto {{$projeto->nome_projeto}}</h3>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Edital</label>
                    <input name="edital" class="form-control" placeholder="Nome do Projeto" value="{{$edital->nome}}" disabled>
                </div>
                <div class="form-group">
                    <label>Nome do Projeto</label>
                    <input name="nome_projeto" class="form-control" placeholder="Nome do Projeto" value="{{$projeto->nome_projeto}}" disabled>
                </div>
                <div class="form-group">
                    <label>Campus</label>
                    <select class="form-control" name="campus" disabled >
                        <option value="{{$projeto->campus}}">{{$projeto->campus}}</option>
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
                    <select class="form-control" name="area" disabled>
                        <option value="{{$projeto->area}}">{{$projeto->area}}</option>
                        <option value="Ciências Agrárias"> Ciências Agrárias</option>
                        <option value="Exatas"> Exatas</option>
                        <option value="Meio Ambiente"> Meio Ambiente</option>
                        <option value="Saúde"> Saúde</option>
                        <option value="Tecnologia"> Tecnologia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Quais os problemas / necessidades a sua solução pretende resolver?</label>
                    <textarea disabled name="problemas" class="form-control" rows="3" placeholder="..."  required >{{$projeto->problemas}}</textarea>
                </div>
                <div class="form-group">
                    <label>Quais as características da sua solução? Quais são seus diferenciais?</label>
                    <textarea disabled name="caracteristicas" class="form-control" rows="3" placeholder="..." required>{{$projeto->caracteristicas}}</textarea>
                </div>
                <div class="form-group">
                    <label>Quem é o seu público alvo?</label>
                    <textarea disabled name="publico_alvo" class="form-control" rows="3" placeholder="..." required>{{$projeto->publico_alvo}}</textarea>
                </div>
                <div class="form-group">
                    <label>Quais são as dificuldades e necessidades para realizar a ideia?</label>
                    <textarea disabled name="dificuldades" class="form-control" rows="3" placeholder="..." required>{{$projeto->dificuldades}}</textarea>
                </div>
                <div class="form-group">
                    <label>Qual a tua disponibilidade e motivação para desenvolver o projeto?</label>
                    <textarea disabled name="disponibilidade" class="form-control" rows="3" placeholder="..." required>{{$projeto->disponibilidade}}</textarea>
                </div>
                <div class="form-group">
                    <label>Quais são os resultados esperados?</label>
                    <textarea disabled name="resultados" class="form-control" rows="3" placeholder="..." required>{{$projeto->resultados}}</textarea>
                </div>
                <div class="form-group">
                    <label>Indicação do pesquisador / mentor</label>
                    <input disabled value="{{$projeto->nomeMentor}}" name="nomeMentor" class="form-control" placeholder="Nome do mentor" required>
                    <small class="form-text text-muted">Insira o nome completo</small>
                </div>
                <div class="form-group">
                    <label>Instituição</label>
                    <input disabled value="{{$projeto->instituicao}}" name="instituicao" class="form-control" placeholder="Instituição" required>
                    <small class="form-text text-muted">Insira a instituição em que seu mentor trabalha</small>
                </div>
                <div class="form-group">
                    <label>Área </label>
                    <input disabled value="{{$projeto->areaMentor}}" name="areaMentor" class="form-control" placeholder="Área de atuação" required>
                    <small class="form-text text-muted">Insira a área de atuação do seu mentor</small>
                </div>
                <div class="form-group">
                    <label>Email </label>
                    <input disabled value="{{$projeto->email}}" name="email" class="form-control" placeholder="Email" required>
                    <small class="form-text text-muted">Insira o email do seu mentor</small>
                </div>
                <div class="form-group">
                    <label>Telefone </label>
                    <input disabled value="{{$projeto->telefone}}" name="telefone" class="form-control" placeholder="Telefone" required>
                    <small class="form-text text-muted">Insira o telefone do seu mentor</small>
                </div>
                <form method="post" action="{{route('projetos.updateRejeicao', $projeto->id )}}">
                    @csrf
                    <div class="form-group">
                        <label>Justificar</label>
                        <textarea name="justificar" class="form-control   @error('justificar') is-invalid @enderror" rows="3" placeholder="..."   >{{ old('justificar')}}</textarea>
                        @error('justificar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Rejeitar</button>
                    <a href="{{route('projetos.showEquipe', $projeto->id )}}"> <button type="button" class="btn btn-success">Ver Equipe</button></a>
                </form> </div>
        </div>
    </section>

@endsection
