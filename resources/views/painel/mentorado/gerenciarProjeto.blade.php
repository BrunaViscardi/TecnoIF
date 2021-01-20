@extends('painel.Layout.index')
@section('content')
    <section class="content">
        @if( count($projetos)==0)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editais </h3>
                </div>
                <div class="card-body p-0">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach ($editais as $edital)
                            <tr>
                                <td>{{$edital->nome}}</td>
                                <td>{{$edital->data->format('d/m/Y')}}</td>
                                @if($edital->situacao == 'Inscrições Abertas')
                                    <td><span class="badge bg-danger">inscrições Abertas</span></td>
                                @endif
                                @if($edital->situacao == 'Edital Concluído')
                                    <td><span class="badge bg-success">Edital Concluído</span></td>
                                @endif
                                @if($edital->situacao == 'Edital de Abertura')
                                    <td><span class="badge bg-warning">Edital de Abertura</span></td>
                                @endif
                                <td>
                                    <a href="{{$edital->link}}">
                                        <button type="button" class="btn btn-danger btn-sm">ver</button>
                                    </a>
                                    @if($edital->situacao == 'Inscrições Abertas')
                                        <a href={{route('painel.mentorado.cadastro',['id'=>$edital->id])}}>
                                            <button type="button" class="btn btn-danger btn-sm">Inscrição</button>
                                        </a>
                                        @endif
                                </td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Projeto</h3>
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
                                                <td>
                                                    <form method="post" action="{{route('painel.mentorado.editar',$projeto->id )}}">
                                                        <a href="{{route('painel.mentorado.visualizarProjeto',$projeto->id)}}"><button type="button" class="btn btn-primary">Ver</button></a>
                                                        <a href="{{route('painel.mentorado.equipe',$projeto->id)}}"><button type="button"  class="btn btn-success">Equipe</button></a>
                                                        @csrf
                                                    @method('PUT')

                                                        @if($projeto->situacao->situacao == "Inscrito"  || $projeto->situacao->situacao == "Em andamento" )
                                                         <button type="submit" class="btn btn-warning ">Editar</button>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-header">
                                    {{$projetos->links() }}
                                </div>

        @endif
        </section>
@endsection
