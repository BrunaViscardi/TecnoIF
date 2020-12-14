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
                            <a href="{{route('painel.mentorado.cadastroEquipe',$projeto->id)}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                        </th>
                    </tr> @foreach ($equipe as $e)

                    <td>{{$e->nome}}</td>
                    <td>{{$e->email}}</td>
                    <td>{{$e->telefone}}</td>
                        <tr>
                    </thead>
                    @endforeach
                    <tbody>
                    <tr>

                    </tbody>
                </table>
            </div>
        </div>
@endsection


