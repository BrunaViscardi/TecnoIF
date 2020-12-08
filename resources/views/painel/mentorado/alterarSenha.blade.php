@extends('painel.Layout.index')
@section('content')
    <form action="{{route('')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Email </label>
                <input name="Email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Senha Atual</label>
                <input name="senha" class="form-control" type="password" placeholder="senha" required>
            </div>
            <div class="form-group">
                <label>Senha Nova</label>
                <input name="SenhaNova" class="form-control" type="password" required>
            </div>
            <div class="form-group">
                <label>Repita a senha nova</label>
                <input name="SenhaNova" class="form-control" type="password" required>
            </div>

        </div>
@endsection
