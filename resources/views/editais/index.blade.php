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
                        <h3 class="card-title">Editais</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <form action="{{ route('editais.filtro') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="filtro" value="{{ request()->filtro }}" class="form-control float-right"
                                               placeholder="Filtrar">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Situação</th>
                                <th>Ações</th>
                                @if(Auth::user() && Auth::user()->isCoordenador())
                                <th>
                                    <a href="{{route('editais.createView')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                                </th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($editais as $edital)
                                <?php
                                $aux = $editais;
                                ?>
                                <tr>
                                    <td>{{$edital->nome}}</td>
                                    <td>{{$edital->data->format('d/m/Y')}}</td>
                                    @if($edital->situacao == 'Inscrições Abertas')
                                        <td><span class="badge bg-danger">inscrições Abertas</span></td>
                                    @endif
                                    @if($edital->situacao == 'Edital em Período de Avalição')
                                        <td><span class="badge bg-secondary">Edital em Período de Avalição</span></td>
                                    @endif
                                    @if($edital->situacao == 'Edital Concluído')
                                        <td><span class="badge bg-success">Edital Concluído</span></td>
                                    @endif
                                    @if($edital->situacao == 'Edital de Abertura')
                                        <td><span class="badge bg-warning">Edital de Abertura</span></td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCoordenador())
                                        <td>
                                            <form method="post" action="{{route('editais.updateView',$edital->id )}}">
                                                <a href="{{$edital->link}}" target="_blank">
                                                    <button type="button" class="btn bg-info btn-sm">Ver</button>
                                                </a>

                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn bg-success btn-sm">Editar</button>

                                                <a href="{{route('editais.updateSituacaoView',$edital->id)}}"> <button type="button" class="btn btn-warning btn-sm">Mudar situação</button></a>

                                            </form>
                                        </td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCandidato())
                                        <td>
                                            <a href="{{$edital->link}}">
                                                <button type="button" class="btn bg-info btn-sm">ver</button>
                                            </a>
                                            @if($edital->situacao == 'Inscrições Abertas')
                                                <a href={{route('painel.mentorado.cadastro',['id'=>$edital->id])}}>
                                                    <button type="button" class="btn bg-success btn-sm">Inscrição</button>
                                                </a>
                                            @endif
                                        </td>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-header">
                        {{ $editais->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                    <a href="{{route('painel.coordenador.deleteEdital',$edital->id)}}">
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
@endsection

