@extends('painel.Layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Cadastro de Gestores</h3>
            </div>
            <form action="{{route('painel.coordenador.enviar')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome </label>
                        <input name="nome" class="form-control" placeholder="Nome do gestor">
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>senha</label>
                        <input name="senha" class="form-control" placeholder="senha" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Terminar cadastro</button>
                </div>
            </form>
        </div>
    </section>


@endsection
