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
@endsection


