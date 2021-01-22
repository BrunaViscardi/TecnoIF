@if(Auth::user() && Auth::user()->isAdministrador())
@extends('painel.layout.index')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Página de erro 403
        </h1>
        <ol class="breadcrumb">
            <li class="active">Erro 403</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 403</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Ops! Acesso negado.</h3>
                <p>
                    Não foi possível acessar a página que você estava procurando.
                    Enquanto isso, você pode retornar ao painel
                    <a href="{{route('painel.home')}}">retornar para a página principal</a>
            </div>
        </div>
    </section>
    @endsection
@endif
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="margin-bottom: 8px">Editais</h3>
                            <div class=" card-tools row">
                                <form action="{{route('editais.filtrodata')}}" method="GET">
                                    <div class="input-group  input-group-sm col" >
                                        <input name="data" type="date" value="{{ request()->data }}" class="form-control-sm " style="border-color: lightgrey;" id="inputGroupSelect04">


                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" style="border-color: lightgrey;" type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <br>
                                <form action="{{ route('editais.filtro') }}" method="GET">
                                    <div class="input-group input-group-sm col " style="width: 150px;">
                                        <input type="text" name="filtro" value="{{ request()->filtro }}" class="form-control float-right"
                                               placeholder="Filtrar">
                                        <div class="input-group-append">
                                            <button type="submit" style="border-color: lightgrey;" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <br>

                            </div>
                        </div>
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Situação</th>
                                @if(Auth::user() && Auth::user()->isCoordenador())
                                <th>
                                    <a href="{{route('editais.createView')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                                </th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($editais as $edital)
                                <tr>
                                    <td>{{$edital->nome}}</td>
                                    <td>{{$edital->data->format('d/m/Y')}}</td>
                                    @if($edital->situacao == 'Inscrições Abertas')
                                        <td><span class="badge bg-danger">Inscrições Abertas</span></td>
                                    @endif
                                    @if($edital->situacao == 'Período de Avalição')
                                        <td><span class="badge bg-secondary">Período de Avalição</span></td>
                                    @endif
                                    @if($edital->situacao == 'Concluído')
                                        <td><span class="badge bg-success">Edital Concluído</span></td>
                                    @endif
                                    @if($edital->situacao == 'Abertura')
                                        <td><span class="badge bg-warning">Edital de Abertura</span></td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCoordenador())
                                        <td>
                                            <form method="get" action="{{route('editais.updateView',$edital->id )}}">
                                                <a href="{{$edital->link}}" target="_blank">
                                                    <button type="button" class="btn btn-primary btn-sm">Ver</button>
                                                </a>
                                                @csrf

                                                <button type="submit" class="btn btn-warning btn-sm">Editar</button>

                                                <a href="{{route('editais.updateSituacaoView',$edital->id)}}"> <button type="button" class=" btn btn-danger btn-sm">Mudar situação</button></a>

                                            </form>
                                        </td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCandidato())
                                        <td>
                                            <a href="{{$edital->link}}">
                                                <button type="button" class="btn btn-primary btn-sm">ver</button>
                                            </a>
                                            @if($edital->situacao == 'Inscrições Abertas')
                                                <a href={{route('projetos.createView',['id'=>$edital->id])}}>
                                                    <button type="button" class="btn btn-success btn-sm">Inscrição</button>
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
        </div>
    </section>

@endsection

