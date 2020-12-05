@extends('painel.Layout.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Editais</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Filtrar">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>

                                <th>Data</th>
                                <th>Nome</th>
                                <th>Situação</th>

                                <th>
                                    <a href="{{route('painel.coordenador.cadastroEditais')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($editais as $edital)
                                <tr>
                                    <td>{{$edital->data}}</td>
                                    <td>{{$edital->nome}}</td>
                                    @if($edital->situacao == 'Inscrições Abertas')
                                        <td><span class="badge bg-danger">Inscrições Abertas</span></td>
                                    @endif
                                    @if($edital->situacao == 'Edital Concluído')
                                        <td><span class="badge bg-success">Edital Concluído</span></td>
                                    @endif
                                    @if($edital->situacao == 'Edital de Abertura')
                                        <td><span class="badge bg-warning">Edital Abertura</span></td>
                                    @endif
                                    <td>

                                        @if($edital->situacao == 'Edital Concluído')
                                        <form method="post" action="{{route('painel.coordenador.deleteEdital',$edital->id )}}">
                                            @csrf
                                            <a href="{{$edital->link}}">
                                                <button type="button" class="btn btn-primary btn-sm">ver</button>
                                            </a>
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" >Excluir</button>
                                        </form>
                                            @endif

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
