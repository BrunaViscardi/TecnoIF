<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{url(mix('pages/css/cadastro.css'))}}">
    <link rel="stylesheet" href="{{url(mix('pages/css/style.css'))}}">
    <link rel="stylesheet" href="{{asset ('pages/style.css')}}">
    <title>Cadastro de candidatos</title>
</head>
<body>
<main role="main">
    <div class="container-brant" id="cabecalho">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand " href="#">
                <img id="LogoCabecalho" src="{{ asset('img/logott.png') }}" alt="logo TecnoIF"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/ifmscg/?igshid=1mn46ve39rvhy"> <img
                                id="redeSocial" src="{{ asset('img/i.png') }}" alt="logo Instagram"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://pt-br.facebook.com/tecnoif/">
                            <img id="redeSocial" src="{{ asset('img/f.png') }}" alt="logo Instagram"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.youtube.com/channel/UC_DLD3-ADKtoa6j-EUTqTvg"> <img
                                id="redeSocial" src="{{ asset('img/y.png') }}" alt="logo Instagram"></a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>

    <form action="{{route('home.debug')}}" method="post">
        @csrf
        <div class="container">
            <div class="col-sm">
                <div class="form-group">
                    <label>Nome
                    <input name="nome" class="form-control" placeholder="Nome">
                    </label>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Nascimento
                        <input id="formN" name="data_nascimento" type="date" class="form-control">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Telefone
                        <input name="telefone" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                        </label>
                    </div>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>CPF
                        <input type="text" class="form-control">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>RG
                        <input type="text" class="form-control">
                        </label>
                    </div>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Email
                        <input type="text" class="form-control">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Campus
                        <input name="campus" type="text" class="form-control">
                        </label>
                    </div>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Curso
                        <input name="curso" type="text" class="form-control">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Turno
                        <input name="turno" type="text" class="form-control">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Período
                        <input name="periodo" type="text" class="form-control">
                        </label>
                    </div>
                </div>
                <div>
                    <label id="anexo" class="btn btn-light " for="fupload">Anexe um documento que comprove seus dados bancarios:
                    <input id ="fupload" name="file" type="file" style="display: none" >
                    </label>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Conta
                        <input name="conta" type="text" class="form-control">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Agência
                        <input name="agencia" type="text" class="form-control">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Banco
                        <input name="banco" type="text" class="form-control">
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Endereço
                    <input name="endereco" type="text" class="form-control">
                    </label>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Bairro
                        <input name="bairro" type="text" class="form-control">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Número
                        <input name="numero" type="text" class="form-control">
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Complemento
                        <input id="input" name="complemento" type="text" class="form-control">
                    </label>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>

            </div>
        </div>
    </form>
</main>


<script src="{{ asset ('pages/jquery.js') }}"></script>
<script src="{{ url(mix('pages/js/cadastro.js')) }}"></script>
<script src="{{asset('pages/bootstrap.js')}}"></script>
</body>
</html>
