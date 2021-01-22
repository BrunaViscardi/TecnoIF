@if(Auth::user() && Auth::user()->isCoordenador())
@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Edição de Edital</h3>
            </div>
            <form action="{{route('editais.update', $edital->id)}}" method="get">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Categoria edital </label>
                        <input value="{{$edital->nome}}" name="nome" class="form-control" placeholder="Categoria edital">
                    </div>
                    <div class="form-group">
                        <label>Link </label>
                        <input value="{{$edital->link}}" name="link" class="form-control" placeholder="Link" required>
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <input value="{{$edital->data->format('Y-m-d')}}" name="data" class="form-control " type="date" required>
                    </div>


                </div>

                <div class="card-footer" style="text-align: center">
                    <button type="submit" class="btn btn-success" >Atualizar</button>
                </div>
                @error('justificar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
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
