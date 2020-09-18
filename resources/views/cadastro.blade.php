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

    <body class="bg-light">

    <main role="main">
        <div class="container-brant"  id="cabecalho">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
                <a class="navbar-brand " href="#"> <img id="LogoCabecalho" src="{{ asset('img/logott.png') }}" alt="logo TecnoIF"> </a>
                <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSite">
                    <ul class="navbar-nav ml-auto">


                        <li class="nav-item">
                            <a class="nav-link" href="https://www.instagram.com/ifmscg/?igshid=1mn46ve39rvhy"> <img id="redeSocial" src="{{ asset('img/i.png') }}" alt="logo Instagram" ></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://pt-br.facebook.com/tecnoif/"> <img id="redeSocial" src="{{ asset('img/f.png') }}" alt="logo Instagram" ></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.youtube.com/channel/UC_DLD3-ADKtoa6j-EUTqTvg"> <img id="redeSocial" src="{{ asset('img/y.png') }}" alt="logo Instagram" ></a>
                        </li>

                    </ul>
                </div>

            </nav>
        </div>

        <div class="container">
            <div class="row">
                <div  class="col-sm">
                    <input class="form-control" type="text" placeholder="Nome do Projeto" >
                    <br>
                    <input class="form-control" type="text" placeholder="Nome do Titular do Projeto" >
                    <br>
                    <input class="form-control" type="email" placeholder="Email" >
                    <br>
                    <input id="curso" class="col-12 col-md-8 form-control" type="text" placeholder="Banco">
                    <input id="periodo" class="col-12 col-md-8 form-control" type="text"  placeholder="Agência">
                    <input id="turno" class="col-12 col-md-8 form-control" type="text"  placeholder="Conta">
                </div>
                <div  class="col-sm">
                    <input class="form-control" type="text" placeholder="Expectativa">

                        <br>

                        <input id="cpf" class="col-12 col-md-8 form-control" type="text" placeholder="CPF">

                        <input id="rg" class="col-12 col-md-8 form-control" type="text" placeholder="RG">
                        <input  id="endereco" class="form-control" type="email" placeholder="Endereço" >
                    <br>

                </div>
                <div  class="col-sm">
                    <select class="form-control"  name="Área">
                        <option value=" "> Área</option>
                        <option value="Fev">Fevereiro</option>
                        <option value="Mar">Março</option>
                        <!-- ... -->
                    </select>
                    <br>
                    <input id="data" class="col-12 col-md-8 form-control" type="date"  placeholder="Data">
                    <input id="campus" class="col-12 col-md-8 form-control" type="text" placeholder="Campus">

                        <input id="bairro" class="col-12 col-md-8 form-control" type="text"  placeholder="Bairro">
                        <input id="numero" class="col-12 col-md-8 form-control" type="text" placeholder="Número">


                </div>
                <div  class="col-sm">
                   <input id="file"  type="file">

                    <input id="curso" class="col-12 col-md-8 form-control" type="text" placeholder="Curso">
                    <input id="periodo" class="col-12 col-md-8 form-control" type="text"  placeholder="Período">
                    <input id="turno" class="col-12 col-md-8 form-control" type="text"  placeholder="Turno">
                    <input id="complemento" class="form-control" type="text" placeholder="Complemento">
                </div>


            </div>
        </div>
    </main>


    <script src="{{ asset ('pages/jquery.js') }}"></script>
    <script src="{{ url(mix('pages/js/cadastro.js')) }}"></script>
    <script src="{{asset('pages/bootstrap.js')}}"></script>
    </body>
</html>
