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
                            <td>{{$edital->data}}</td>
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
                                <a>
                                    <button type="button" class="btn btn-danger btn-sm">Editar</button>
                                </a>
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
