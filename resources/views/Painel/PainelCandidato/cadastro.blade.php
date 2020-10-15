@extends('Painel.Layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Cadastro de Projeto</h3>
            </div>
            <form action="{{route('Painel.enviar')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome do Projeto</label>
                        <input name="nome_projeto" class="form-control"
                               placeholder="Nome do Projeto">
                    </div>
                    <div class="form-group">
                        <label>Expectativa</label>
                        <textarea name="expectativa" class="form-control" rows="3"
                                  placeholder="..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Área</label>
                        <select multiple class="form-control" name="area">
                            <option value="Meio Ambiente"> Meio Ambiente</option>
                            <option value="Saúde"> Saúde</option>
                            <option value="Exatas"> Exatas</option>
                            <option value="Tecnologia"> Tecnologia</option>
                            <option value="Ciências Agrárias"> Ciências Agrárias</option>
                        </select>
                    </div>
                    <div>
                        <label>Proposta de pré-projeto</label>
                        <input name="proposta" type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        </section>


@endsection
