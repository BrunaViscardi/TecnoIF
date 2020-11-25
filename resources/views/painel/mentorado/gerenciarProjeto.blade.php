@extends('painel.Layout.index')
@section('content')
    <section class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->


                    @if( count($projetos)==0)
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Editais TecnoIF</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">Ano</th>
                                        <th>Edital</th>

                                        <th style="width: 40px">Situação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2020</td>
                                        <td>Pré-Incubação</td>

                                        <td><span class="badge bg-danger">Aberto para inscrições</span></td>
                                        <td>
                                            <button class="btn btn-primary">Ver</button>
                                        </td>
                                        <td><a href="{{route('painel.mentorado.cadastro')}}">
                                                <button class="btn btn-success">Inscrição</button>
                                            </a></td>
                                    </tr>
                                    <tr>
                                        <td>2020</td>
                                        <td>Empresa Junior</td>
                                        <td><span class="badge bg-warning">Edital de abertura</span></td>
                                        <td>
                                            <button class="btn btn-primary">Ver</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2019</td>
                                        <td>Pré-incubação</td>
                                        <td><span class="badge bg-success">Edital concluído</span></td>
                                        <td>
                                            <button class="btn btn-primary">Ver</button>
                                        </td>
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

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <button id="bexportar" class=" btn btn-secondary btn-sm">Exportar</button>
                                        </div>
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

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($projetos as $projeto)

                                            <tr>
                                                <td>Pré-incubação</td>
                                                <td>{{$projeto->nome_projeto}}</td>
                                                <td>{{$projeto->campus}}</td>
                                                <td>{{$projeto->area}}</td>
                                                <td>Inscrito</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm">Ver</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>

                        </div>

                </div>
            @endif
        </section>


@endsection
