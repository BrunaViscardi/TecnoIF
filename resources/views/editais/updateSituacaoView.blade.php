@if(Auth::user() && Auth::user()->isCoordenador())
@extends('painel.layout.index')

@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Edital</h3>
            </div>
            <form action="{{route('editais.updateSituacao',$edital->id )}}" method="post">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Categoria edital </label>
                        <input name="nome" value="{{$edital->nome}}" class="form-control" placeholder="Categoria edital" disabled>
                    </div>
                    <div class="form-group">
                        <label>Link </label>
                        <input value="{{$edital->link}}" name="link" class="form-control" placeholder="Link" disabled required>
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <input value="{{$edital->data->format('Y-m-d')}}" name="data" class="form-control" type="date" disabled>
                    </div>
                    <label>Situação do Edital</label>
                    <div class="form-group">
                        <select class="form-control @error('situacao') is-invalid @enderror" name="situacao">
                            <option value="">Situação</option>
                            <option value="Abertura">Edital de Abertura</option>
                            <option value="Inscrições Abertas">Inscrições Abertas</option>
                            <option value="Período de Avalição"> Edital em Período de Avalição</option>
                            <option value="Concluído">Edital Concluído</option>
                        </select>

                        @error('situacao')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror</div>
                </div>
                <div class="card-footer" style=" text-align: center">
                    <button type="submit" style="text-align: center" class="btn btn-success">Mudar Situação</button>
                </div>
            </form>



        </div>
    </section>
@endsection
@else
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

