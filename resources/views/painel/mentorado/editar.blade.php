@extends('painel.Layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Cadastro de Projeto</h3>
            </div>
            <form action="{{route('painel.enviar')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input name="nome_projeto" class="form-control"
                               placeholder="Nome do Projeto">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Data de nascimento</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group col">
                            <label>Telefone</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>CPF</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col">
                            <label>RG</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Curso</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col">
                            <label>Turno</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col">
                            <label>Período</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>


@endsection
