
@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Edição Gestor</h3>
            </div>
            <form action="{{route('gestores.update',  $gestor->id )}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome </label>
                        <input name="nome" value="{{ $gestor->nome}}" class="form-control   @error('nome') is-invalid @enderror" placeholder="Nome do gestor">
                        @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input name="email" value="{{ $gestor->email}}" class="form-control   @error('email') is-invalid @enderror" placeholder="Email" >
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Campus </label>
                        <select name="campus" class="form-control   @error('campus') is-invalid @enderror"  >
                            <option value="{{$gestor->campus}}">{{$gestor->campus}}</option>
                            <option value="Aquidauana" {{ old('campus') == "Aquidauana" ? 'selected' : '' }}>Aquidauana</option>
                            <option value="Campo Grande" {{ old('campus') == "Campo Grande" ? 'selected' : '' }}>Campo Grande</option>
                            <option value="Corumbá" {{ old('campus') == " Corumbá" ? 'selected' : '' }}>Corumbá</option>
                            <option value="Coxim" {{ old('campus') == " Coxim" ? 'selected' : '' }}>Coxim</option>
                            <option value="Dourados" {{ old('campus') == " Dourados" ? 'selected' : '' }}>Dourados</option>
                            <option value="Jardim" {{ old('campus') == " Jardim" ? 'selected' : '' }}>Jardim</option>
                            <option value="Naviraí" {{ old('campus') == " Naviraí" ? 'selected' : '' }}>Naviraí</option>
                            <option value="Nova Andradina" {{ old('campus') == " Nova Andradina" ? 'selected' : '' }}>Nova Andradina</option>
                            <option value="Ponta Porã" {{ old('campus') == " Ponta Porã" ? 'selected' : '' }}>Ponta Porã</option>
                            <option value="Três Lagoas" {{ old('campus') == "Três Lagoas" ? 'selected' : '' }}>Três Lagoas</option>
                        </select>
                        @error('campus')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>senha</label>
                        <input name="senha" type="password" value="{{$gestor->senha}}" class="form-control  @error('senha') is-invalid @enderror" placeholder="senha" >
                        @error('senha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer" style=" text-align: center">
                    <button type="submit" style="text-align: center" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
