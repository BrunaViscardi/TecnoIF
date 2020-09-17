<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    '<link rel="stylesheet" href="{{url(mix('pages/css/login.css'))}}">
    <link rel="stylesheet" href="{{asset ('pages/style.css')}}">
    <title>Login</title>
</head>
<body id="t">

<form class="form-signin" method="post" action="{{ route('admin.login.do')}}">
    @csrf
    <img src="{{ asset('img/TecnoIF.png') }}" width="100%" alt="TecnoIF" >
    @if($errors->all())
        @foreach($errors->all() as $error)

            <div class="alert alert-danger" role="alert">

               {{$error}}
            </div>
        @endforeach
    @endif

    <label for="email" class="sr-only">Email </label>
    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
    <label for="password" class="sr-only">Senha</label>
    <input name="password" type="password" id="password" class="form-control" placeholder="Senha" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="Lembrar-me"> Lembrar-me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

</form>


<script src="{{ asset ('pages/jquery.js') }}"></script>
<script src="{{ url(mix('pages/js/script.js')) }}"></script>
<script src="{{asset('pages/bootstrap.js')}}"></script>

</body>
</html>

