@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Alterar senha</h3>
            </div>
            <form  action="#" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group col">
                        <label>Email </label>
                        <input value="{{$user->email}}" name="Email" class="form-control " placeholder="Email" disabled>
                    </div>
                    <div class="form-group col">
                        <label>Senha Atual</label>
                        <input name="senhaAtual" class="form-control @error('senhaAtual') is-invalid @enderror"  placeholder="senha Atual">
                        @error('senhaAtual')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Senha Nova</label>
                        <input name="senha" class="form-control @error('senha') is-invalid @enderror" placeholder="senha" type="password">
                        @error('senha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="form-group col">
                        <label>Confirme sua senha</label>
                        <input name="senha_confirmation" class="form-control  @error('senha') is-invalid @enderror" placeholder="senha" type="password">
                        @error('senha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer" style=" text-align: center">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
