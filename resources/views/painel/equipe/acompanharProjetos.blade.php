@extends('painel.Layout.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Projetos</h3>
                        <div class="card-tools">
                            <form action="{{ route('painel.equipe.filtrar') }}" method="GET">
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
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>

                                <th>Edital</th>
                                <th>Nome</th>
                                <th>Campus</th>
                                <th>Área</th>
                                <th>Situação</th>
                                <th>Email</th>
                                <th>
                                    <button class="btn btn-success float-right">Exportar</button>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projetos as $projeto)

                                <tr>
                                    <td>{{$projeto->edital->nome}}</td>
                                    <td>{{$projeto->nome_projeto}}</td>
                                    <td>{{$projeto->campus}}</td>
                                    <td>{{$projeto->area}}</td>
                                   <td>{{$projeto->situacao->situacao}}</td>
                                    <td>{{$projeto->email}}</td>
                                    <td>
                                        <form method="post" action="{{route('painel.equipe.visualizarProjeto', $projeto->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <?php
                                                $e = $edital->where('id',$projeto->edital_id)->first();
                                            ?>
                                            <button type="submit" class="btn btn-primary btn-sm">Ver</button>
                                            @if($e->situacao =="Edital em Período de Avalição")

                                                @if( $projeto->situacao->situacao =='Inscrito')
                                                <a href="{{route('painel.equipe.aprovar', $projeto->id)}}"><button type="button" class="btn btn-danger btn-sm">Aprovar</button></a>
                                                    <a href="{{route('painel.coordenador.rejeitar', $projeto->id)}}"><button type="button" class="btn btn-danger btn-sm">Rejeitar</button></a>
                                                @endif
                                                @if( $projeto->situacao->situacao =='Em andamento')
                                                    <a href="{{route('painel.equipe.aprovar', $projeto->id)}}"><button type="button" class="btn btn-danger btn-sm">Concluir mentoria</button></a>
                                                @endif
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">

                        {{ $projetos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
