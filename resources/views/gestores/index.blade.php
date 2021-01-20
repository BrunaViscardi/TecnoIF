@extends('painel.Layout.index')
@section('content')
    <?php
    $aux = null;
    ?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gestores</h3>
                        <div class="card-tools">
                            <form action="{{ route('gestores.filtro') }}" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" value="{{ request()->filtro }}" name="filtro" class="form-control float-right"
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
                                    <a href="{{route('gestores.createView')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($gestores as $gestorr)
                                <?php
                                $aux = $gestores;
                                ?>
                                <tr>
                                    <td>{{$gestorr->nome}}</td>
                                    <td>{{$gestorr->email}}</td>
                                    <td>


                                        <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal"><button class="btn btn-danger btn-sm">Excluir</button></a>
                                        <a href="{{route('gestores.updateView',$gestorr->id)}}}}">
                                            <button type="button" class="btn bg-success btn-sm" >Editar</button>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">

                        {{ $gestores->links() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="siteModal" tabindex="-1" role="dialog">
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
                        <?php
                        if($aux != null){


                        ?>

                        <a href="{{route('gestores.destroy', $gestorr->email)}}">
                            <button type="button" class="btn btn-danger">
                                Excluir
                            </button>
                        </a>
                        <?php  }?>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
