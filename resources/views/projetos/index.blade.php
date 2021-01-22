@extends('painel.layout.index')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-bottom: 8px">Projetos</h3>
                        <div class=" card-tools row">
                            <form action="{{ route('projetos.filtro') }}" method="GET">
                                <div class="input-group  input-group-sm col" >
                                    <select name="situacao" class="form-control-sm custom-select" style="border-color: lightgrey;" id="inputGroupSelect04">
                                        <option value="" >Situação do edital</option>
                                        <option value="Abertura" {{ old('situacao') == "Abertura" ? 'selected' : '' }}>Aberto</option>
                                        <option value="Inscrições Abertas" {{ old('situacao') == "Inscrições Abertas" ? 'selected' : '' }}>Inscrições Abertas</option>
                                        <option value="Período de Avalição" {{ old('situacao') == "Período de Avalição" ? 'selected' : '' }}>Em período de avaliação</option>
                                        <option value="Concluído" {{ old('situacao') == "Concluído" ? 'selected' : '' }}>Concluído</option>
                                    </select>

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" style="border-color: lightgrey;" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <br>
                                <form action="{{ route('projetos.filtro') }}" method="GET">
                                    <div class="input-group input-group-sm col " style="width: 150px;">
                                        <input type="text" name="filtro" value="{{ request()->filtro }}" class="form-control float-right"
                                               placeholder="Filtrar">
                                        <div class="input-group-append">
                                            <button type="submit" style="border-color: lightgrey;" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            <br>

                        </div>
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>


                                <th>Nome</th>
                                <th>Edital</th>
                                <th>Campus</th>
                                <th>Área</th>
                                <th>Situação</th>
                                <th>Email</th>
                                @if(Auth::user() && Auth::user()->isCoordenador() || Auth::user()->isAdministrador())
                                <th>
                                    <a href="{{route('projetos.export')}}"><button class="btn btn-primary float-right">Exportar</button></a>
                                </th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projetos as $projeto)

                                <tr>
                                    <td>{{$projeto->edital->situacao}}</td>

                                    <td>{{$projeto->nome_projeto}}</td>
                                    <td>{{$projeto->edital->nome}}</td>
                                    <td>{{$projeto->campus}}</td>
                                    <td>{{$projeto->area}}</td>
                                    <td>{{$projeto->situacao->situacao}}</td>
                                    <td>{{$projeto->email}}</td>
                                    @if(Auth::user() && Auth::user()->isCandidato())
                                    <td>
                                        <form method="post" action="{{route('projetos.updateCadastroView',$projeto->id )}}">
                                            <a href="{{route('projetos.show',$projeto->id)}}"><button type="button" class="btn btn-primary  btn-sm">Ver</button></a>
                                            <a href="{{route('projetos.showEquipe',$projeto->id)}}"><button type="button"  class="btn btn-success btn-sm">Equipe</button></a>
                                            @csrf
                                            @method('PUT')

                                            @if($projeto->situacao->situacao == "Inscrito"  || $projeto->situacao->situacao == "Em andamento" )
                                                <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                                            @endif
                                        </form>
                                    </td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCoordenador() || Auth::user()->isAdministrador())
                                    <td>

                                            <?php
                                            $e = $edital->where('id',$projeto->edital_id)->first();
                                            ?>
                                                <a href="{{route('projetos.show',$projeto->id)}}">
                                                    <button type="button" class="btn btn-primary btn-sm">Ver</button>
                                                </a>
                                            @if($e->situacao =="Edital em Período de Avalição")

                                                @if( $projeto->situacao->situacao =='Inscrito')
                                                    <a href="{{route('projetos.updateAprovacao', $projeto->id)}}"><button type="button" class=" btn btn-success btn-sm">Aprovar</button></a>
                                                    <a href="{{route('projetos.updateRejeicaoView', $projeto->id)}}"><button type="button" class="btn btn-danger btn-sm">Rejeitar</button></a>
                                                @endif
                                            @endif
                                            @if( $projeto->situacao->situacao =='Em andamento')
                                                <a href="{{route('projetos.updateAprovacao', $projeto->id)}}"><button type="button" class=" btn btn-success btn-sm">Concluir mentoria</button></a>
                                            @endif

                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>  <div class="card-header">
                        {{ $projetos->appends('filtro')->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
