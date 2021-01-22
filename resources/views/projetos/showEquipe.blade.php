@extends('painel.layout.index')
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
                            @if(Auth::user()->isCandidato() && $projeto->situacao_id == 1 ||  $projeto->situacao_id == 2)
                                <a href="{{route('projetos.createEquipeView',$projeto->id)}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                            @endif
                        </th>
                    </tr>
                    @foreach($equipe as $participante)
                        <tr>
                            <td>{{$participante->nome}}</td>
                            <td>{{$participante->email}}</td>
                            <td>{{$participante->telefone}}</td>
                            <td>
                                @if($projeto->bolsista_id != $participante->id and $projeto->situacao_id == 1 ||  $projeto->situacao_id == 2)
                                    <button class="btn btn-danger btn-sm modal-excluir-btn" data-rota="{{route('projetos.destroyParticipante', $participante->id)}}" data-participante="{{$participante->id}} ">Excluir</button>
                                @endif
                                    <a href="{{route('projetos.showParticipante',$participante->id)}}"> <button class="btn btn-primary btn-sm">Ver</button></a>
                                @if(Auth::user()->isCandidato() && $projeto->situacao_id == 1 ||  $projeto->situacao_id == 2 )
                                    <a href="{{route('projetos.updateParticipanteView',$participante->id)}}"> <button class="btn btn-warning btn-sm">Editar</button></a>
                                @endif


                            </td>
                        </tr>
                    @endforeach
                    <tbody>
                    <tr>
                    </tbody>
                </table>
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
                        <a id="href-excluir-participante" href="#">
                            <button type="button" class="btn btn-danger">
                                Excluir
                            </button>
                        </a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
        @section('script')
            <script type="text/javascript">
                $( document ).ready(function() {
                    $('.modal-excluir-btn').on('click', function(event) {
                        event.preventDefault();
                        let href_da_rota = $(this).attr('data-rota');
                        let participante_id = $(this).attr('data-participante');
                        //define o href do modal para a rota passada
                        $('#href-excluir-participante').attr('href',href_da_rota);
                        //mostra o modal
                        $('.modal-body p').text('Você realmente deseja excluir o participante?'
                            + ' Uma vez excluído não é possível recuperar os dados deletados.');
                        $('#modal-excluir').modal("show");
                    });
                });

            </script>
@endsection
