@extends('painel.Layout.index')
@section('content')
    <section class="content">

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
                                                <td>Pré-incubação</td>
                                                <td>{{$projeto->nome_projeto}}</td>
                                                <td>{{$projeto->campus}}</td>
                                                <td>{{$projeto->area}}</td>
                                                <td>Inscrito</td>
                                                <td>

                                                    <form method="post" action="{{route('painel.mentorado.editar',$projeto->id )}}">
                                                        <a href="{{route('painel.mentorado.visualizarProjeto',$projeto->id)}}"><button type="button" class="btn btn-primary btn-sm">Ver</button></a>
                                                        <a href="{{route('painel.mentorado.equipe',$projeto->id)}}"><button type="button" class="btn btn-warning btn-sm">Montar equipe</button></a>
                                                        @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>

        </section>


@endsection
