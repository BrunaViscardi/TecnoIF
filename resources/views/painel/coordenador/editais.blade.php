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

                        <th>Nome</th>
                        <th>Data</th>
                        <th>situação</th>
                        <th>Ações</th>
                        <th>
                            <button class="btn btn-success float-right">Exportar</button>
                            <a href="{{route('painel.coordenador.cadastroEditais')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach ($editais as $edital)
                        <tr>
                            <td>{{$edital->data}}</td>
                            <td>{{$edital->nome}}</td>
                            @if($edital->situacao == 'Inscrições abertas')
                                <td><span class="badge bg-danger">inscrições abertas</span></td>
                            @endif
                            @if($edital->situacao == 'Edital concluído')
                                <td><span class="badge bg-success">Edital concluído</span></td>
                            @endif
                            @if($edital->situacao == 'Edital de abertura')
                                <td><span class="badge bg-warning">Edital de abertura</span></td>
                            @endif
                            <td>
                                <a href="{{$edital->link}}">
                                    <button type="button" class="btn btn-primary btn-sm">ver</button>
                                </a>
                                <button type="button" class="btn btn-success btn-sm">Editar</button>
                                <button type="button" class="btn btn-danger btn-sm">Apagar</button>
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
