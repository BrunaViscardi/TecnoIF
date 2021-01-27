
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
