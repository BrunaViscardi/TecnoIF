@extends('painel.Layout.index')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gestores</h3>
                        <div class="card-tools">
                            <form action="{{ route('painel.coordenador.filtrarGestores') }}" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="filtro" class="form-control float-right"
                                           placeholder="Filtrar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table  class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ações</th>
                                <th>
                                   <a href="{{route('painel.coordenador.cadastroGestores')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($gestores as $gestor)

                                <tr>
                                    <td>{{$gestor->nome}}</td>
                                    <td>{{$gestor->email}}</td>
                                    <td>
                                        <form method="post" action="{{route('painel.coordenador.deleteGestor',$gestor->email )}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" >Excluir</button>
                                           <a href="{{route('painel.coordenador.editarGestor',$gestor->id)}}}}"><button type="button" class="btn btn-danger btn-sm" >Editar</button></a>
                                        </form>
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
