@extends('painel.Layout.index')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Projetos</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <form action="{{ route('projetos.filtro') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="filtro" value="{{ request()->filtro }}" class="form-control float-right"
                                               placeholder="Filtrar">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-header -->
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
                                    <a href="{{route('painel.coordenador.export')}}"><button class="btn btn-primary float-right">Exportar</button></a>
                                </th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projetos as $projeto)

                                <tr>

                                    <td>{{$projeto->nome_projeto}}</td>
                                    <td>{{$projeto->edital->nome}}</td>
                                    <td>{{$projeto->campus}}</td>
                                    <td>{{$projeto->area}}</td>
                                    <td>{{$projeto->situacao->situacao}}</td>
                                    <td>{{$projeto->email}}</td>
                                    @if(Auth::user() && Auth::user()->isCandidato())
                                    <td>
                                        <form method="post" action="{{route('painel.mentorado.editar',$projeto->id )}}">
                                            <a href="{{route('painel.mentorado.visualizarProjeto',$projeto->id)}}"><button type="button" class="btn btn-primary  btn-sm">Ver</button></a>
                                            <a href="{{route('painel.mentorado.equipe',$projeto->id)}}"><button type="button"  class="btn btn-success  btn-sm">Equipe</button></a>
                                            @csrf
                                            @method('PUT')

                                            @if($projeto->situacao->situacao == "Inscrito"  || $projeto->situacao->situacao == "Em andamento" )
                                                <button type="submit" class="btn btn-warning  btn-sm ">Editar</button>
                                            @endif
                                        </form>
                                    </td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCoordenador())
                                    <td>
                                        <form method="post" action="{{route('projetos.show', $projeto->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <?php
                                            $e = $edital->where('id',$projeto->edital_id)->first();
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm">Ver</button>
                                            @if($e->situacao =="Edital em Período de Avalição")

                                                @if( $projeto->situacao->situacao =='Inscrito')
                                                    <a href="{{route('projetos.updateAprovacao', $projeto->id)}}"><button type="button" class="btn btn-success btn-sm">Aprovar</button></a>
                                                    <a href="{{route('projetos.updateRejeicaoView', $projeto->id)}}"><button type="button" class="btn btn-danger btn-sm">Rejeitar</button></a>
                                                @endif
                                            @endif
                                            @if( $projeto->situacao->situacao =='Em andamento')
                                                <a href="{{route('painel.coordenador.aprovar', $projeto->id)}}"><button type="button" class="btn btn-danger btn-sm">Concluir mentoria</button></a>
                                            @endif

                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>  <div class="card-header">


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
