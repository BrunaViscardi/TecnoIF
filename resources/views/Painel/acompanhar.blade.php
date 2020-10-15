@extends('Painel.Layout.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Projetos</h3>
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
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Projeto</th>
                                <th>Expectativa</th>
                                <th>Área</th>
                                <th>Situação</th>
                                <th>File</th>
                                <th><button class="btn btn-success float-right">Exportar</button></th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>TecnoIF</td>
                                <td>passar</td>
                                <td>Tecnologia</td>
                                <td>Inscrito</td>
                                <td>File.pdf</td>
                                <td><button class="btn btn-primary btn-sm">Mudar situação</button></td>
                                <td><button class="btn btn-primary btn-sm">Excluir</button></td>
                                <td><button class="btn btn-primary btn-sm">visualizar</button></td>



                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </section>


@endsection
