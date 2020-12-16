@extends('painel.Layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Cadastro de Gestores</h3>
            </div>
            <form action="{{route('painel.coordenador.create')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome </label>
                        <input name="nome" class="form-control  value="{{ old('nome')}}" @error('nome') is-invalid @enderror" placeholder="Nome do gestor">
                        @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input name="email" class="form-control  value="{{ old('email')}}" @error('email') is-invalid @enderror" placeholder="Email" >
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Campus </label>
                        <select name="campus" class="form-control   @error('campus') is-invalid @enderror"  >
                            <option value="">Campus</option>
                            <option value="Aquidauana">Aquidauana</option>
                            <option value="Campo Grande">Campo Grande</option>
                            <option value="Corumbá">Corumbá</option>
                            <option value="Coxim">Coxim</option>
                            <option value="Dourados">Dourados</option>
                            <option value="Jardim">Jardim</option>
                            <option value="Naviraí">Naviraí</option>
                            <option value="Nova Andradina">Nova Andradina</option>
                            <option value="Ponta Porã">Ponta Porã</option>
                            <option value="Três Lagoas">Três Lagoas</option>
                        </select>
                            @error('campus')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>senha</label>
                        <input name="senha" type="password" value="{{ old('senha')}}" class="form-control  @error('senha') is-invalid @enderror" placeholder="senha" >
                        @error('senha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Finalizar cadastro</button></div>
            </form>
        </div>
    </section>


@endsection
