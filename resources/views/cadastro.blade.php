<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{url(mix('pages/css/cadastro.css'))}}">
    <link rel="stylesheet" href="{{url(mix('pages/css/style.css'))}}">
    <link rel="stylesheet" href="{{asset ('pages/style.css')}}">


    <title>Cadastro de candidatos</title>
    <script>
        $(document).ready(function($){
            $('#cpf').mask('000.000.000-00', {reverse: true});
        });
    </script>


</head>

    <body class="bg-light">

    <main role="main">
        <form action="{{route('debug')}}" method="post">
            @csrf
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
                    <input name="NomeProjeto" class="form-control" type="text" placeholder="Nome do Projeto" >
                    <br>
                    <input name="Expectativa" class="form-control" type="text" placeholder="Expectativa" >
                    <br>
                    <select name="Area"class="form-control"  name="Área">
                        <option value="0"> Área</option>
                        <option value="1">Fevereiro</option>
                        <option value="3">Março</option>
                    </select>
                    <br>
                    <input name="Email" class="form-control" type="text" placeholder="Email">
                </div>

                <div  class="col-sm">
                    <input name="NomeTitular" class="form-control" type="text" placeholder="Nome do titular do projeto">
                    <br>

                    <input name="Data" id="data" class="col-12 col-md-8 form-control" type="date"  placeholder="Data">
                    <input name="Campus" id="campus" class="col-12 col-md-8 form-control" type="text" placeholder="Campus">

                    <input name="Curso" id="curso" class="col-12 col-md-8 form-control" type="text" placeholder="Curso">
                    <input name="Periodo" id="periodo" class="col-12 col-md-8 form-control" type="text"  placeholder="Período">
                    <input name="Turno" id="turno" class="col-12 col-md-8 form-control" type="text"  placeholder="Turno">
                    <input name="Telefone" class="form-control" type="text" placeholder="Telefone">




                </div>
                <div  class="col-sm">

                    <input name="CPF" id="cpf" class="col-12 col-md-8 form-control" type="text" placeholder="CPF">
                    <input name="RG" id="rg" class="col-12 col-md-8 form-control" type="text" placeholder="RG">
                    <input name="File" id="file"  type="file">

                    <input name="Banco" id="banco" class="col-12 col-md-8 form-control" type="text"  placeholder="Banco">
                    <input name="Agencia" id="agencia" class="col-12 col-md-8 form-control" type="text"  placeholder="Agência">
                    <input name="Conta" id="conta" class="col-12 col-md-8 form-control" type="text" placeholder="Conta">

                </div>


                <div  class="col-sm">
                    <input name="Endereço" id="endereco" class="form-control" type="text" placeholder="Endereço" >
                    <input name="Bairro" id="bairro" class="col-12 col-md-8 form-control" type="text"  placeholder="Bairro">
                    <input name="Número" id="numero" class="col-12 col-md-8 form-control" type="text" placeholder="Número">

                    <input name="Complemento" id="complemento" class="form-control" type="text" placeholder="Complemento">


                </div>
            </div>
        </div><br>
        <input id="botao"  class="form-control"type="submit"><span style="color: #2ca02c; ">Cadastrar</span>
        </form>
    </main>



    <script src="js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script src="{{ asset ('pages/jquery.js') }}"></script>
    <script src="{{ url(mix('pages/js/cadastro.js')) }}"></script>
    <script src="{{asset('pages/bootstrap.js')}}"></script>
    </body>
</html>
