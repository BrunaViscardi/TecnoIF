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
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach ($editais as $edital)
                        <tr>
                            <td>{{$edital->nome}}</td>
                            <td>{{$edital->data}}</td>
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
                                    <button type="button" class="btn btn-danger btn-sm">ver</button>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm">Editar</button>
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

<td><span class="badge bg-warning">Edital de abertura</span></td>

                        <td><span class="badge bg-success">Edital concluído</span></td>

