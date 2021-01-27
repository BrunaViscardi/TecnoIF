
@extends('painel.layout.index')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gestores</h3>
                        <div class=" card-tools">
                            <form action="{{ route('gestores.filtro') }}" method="GET">
                                <div class="input-group input-group-sm " style="width: 150px;">
                                    <input type="text" name="filtro" value="{{ request()->filtro }}" class="form-control float-right"
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
                                <th>
                                    <a href="{{route('gestores.createView')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($gestores as $gestorr)
                                <tr>
                                    <td>{{$gestorr->nome}}</td>
                                    <td>{{$gestorr->email}}</td>
                                    <td>

                                        <button class="btn btn-danger btn-sm modal-excluir-btn" data-rota="{{route('gestores.destroy', $gestorr->email)}}" data-gestor="{{$gestorr->email}}">Excluir</button>
                                        <a href="{{route('gestores.updateView',$gestorr->id)}}}}">
                                            <button type="button" class="btn btn-warning btn-sm" >Editar</button>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">

                        {{ $gestores->appends(['filtro' => $filtro ?? ''])->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-excluir" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Deseja excluir?</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> Uma vez excluído não é possível recuperar os dados deletados.</p>
                    </div>
                    <div class="modal-footer">
                            <a id="href-excluir-gestor" href="#">
                            <button type="button" class="btn btn-danger">
                                Excluir
                            </button>
                        </a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
