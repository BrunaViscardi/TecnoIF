@extends('painel.Layout.index')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editais </h3>
            </div>
            <div class="card-body p-0">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>situação</th>
                        <th>Ações</th>
                        <th>
                            <a href="{{route('painel.coordenador.cadastroEditais')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                        </th>
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
                            @if($edital->situacao == 'Edital em Período de Avalição')
                                <td><span class="badge bg-success">Edital em Período de Avalição</span></td>
                            @endif
                            @if($edital->situacao == 'Edital Concluído')
                                <td><span class="badge bg-success">Edital Concluído</span></td>
                            @endif
                            @if($edital->situacao == 'Edital de Abertura')
                                <td><span class="badge bg-warning">Edital de Abertura</span></td>
                            @endif
                            <td>
                                <form method="post" action="{{route('painel.coordenador.editarEdital',$edital->id )}}">
                                    <a href="{{$edital->link}}" target="_blank">
                                        <button type="button" class="btn btn-danger btn-sm">Ver</button>
                                    </a>
                                    @if($edital->situacao == 'Edital de Abertura')
                                    <a href="{{route('painel.coordenador.deleteEdital',$edital->id)}}"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a>
                                   @endif
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                                    @if($edital->situacao != "Edital Concluído")
                                   <a href="{{route('painel.coordenador.mudarSituacao',$edital->id)}}"> <button type="button" class="btn btn-warning btn-sm">Mudar situação</button></a>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
