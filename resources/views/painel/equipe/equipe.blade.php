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
                        <th>Ações</th>

                    </tr>
                    @forelse ($equipe as $participante)
                        <tr>
                            <td>{{$participante->nome}}</td>
                            <td>{{$participante->email}}</td>
                            <td>{{$participante->telefone}}</td>
                            <td>
                                <a href="{{route('painel.equipe.visualizarParticipante',$participante->id)}}"> <button class="btn btn-primary">Ver</button></a>
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
@endsection

