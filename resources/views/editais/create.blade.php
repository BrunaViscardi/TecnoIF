
@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Cadastro de Editais</h3>
            </div>
            <form action="{{route('editais.create')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Categoria edital </label>
                        <input name="nome" class="form-control" placeholder="Categoria edital">
                    </div>
                    <div class="form-group">
                        <label>Link </label>
                        <input name="link" class="form-control" placeholder="Link" required>
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <input name="data" class="form-control" type="date" required>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
