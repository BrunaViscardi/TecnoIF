@extends('painel.Layout.index')
@section('content')

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Equipe {{$projeto->nome_projeto}} </h3>
            </div>
            <div class="card-body p-0">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>Membro</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>
                            @if($projeto->situacao_id == 1 ||  $projeto->situacao_id == 2)
                            <a href="{{route('painel.mentorado.cadastroEquipe',$projeto->id)}}"><button class="btn btn-success float-right" style="margin-right:2%">Cadastrar</button></a>
                            @endif
                        </th>
                    </tr>
                    @forelse ($equipe as $participante)
                        <tr>
                            <td>{{$participante->nome}}</td>
                            <td>{{$participante->email}}</td>
                            <td>{{$participante->telefone}}</td>
                            <td>
                                @if($projeto->bolsista_id != $participante->id and $projeto->situacao_id == 1 ||  $projeto->situacao_id == 2)

                                <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal"><button class="btn btn-danger">Excluir</button></a>
                                @endif
                                @if($projeto->situacao_id == 1 ||  $projeto->situacao_id == 2)
                                    <a href="{{route('painel.mentorado.editarParticipante',$participante->id)}}"> <button class="btn btn-warning">Editar</button></a>
                                    @endif
                                    <a href="{{route('painel.mentorado.visualizarParticipante',$participante->id)}}"> <button class="btn btn-primary">Ver</button></a>

                            </td>
                        </tr>
                    @empty
                        <tr><td> nenhum membro cadastrado</td></tr>
                    @endforelse
                    <tbody>
                    <tr>
                    </tbody>
                </table>
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
                    <a href="{{route('painel.mentorado.deleteParticipante',$participante->id)}}">
                        <button type="button" class="btn btn-danger"> Excluir</button>
                    </a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endsection


