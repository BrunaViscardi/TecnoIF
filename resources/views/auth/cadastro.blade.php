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
    $(document).ready(function(){
    $('#telefone').mask('(99) 9999-9999');
    });
</script>

</head>
<body>
    <main role="main">
        <form action="{{route('auth.debug')}}" method="post">
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
                <div  class="col-sm">
                    @if($errors->all())
                        @foreach($errors->all() as $error)

                            <div class="alert alert-danger" role="alert">

                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    <input name="nome" id="nomet" class="form-control" type="text" placeholder="Nome do candidato" maxlength="45" required>
                    <input name="data_nascimento" id="data" class="col-12 col-md-8 form-control" type="date"  placeholder="Data" maxlength="45" required>
                    <select name="campus" id="campus" class="col-12 col-md-8 form-control" required>
                        <option value="">Campus</option>
                        <option value="Aquidauana"> Aquidauana </option>
                        <option value="Campo Grande"> Campo Grande</option>
                        <option value="Coxim"> Coxim </option>
                        <option value="Dourados"> Dourados </option>
                        <option value="Jardim"> Jardim </option>
                        <option value="Naviraí">Naviraí</option>
                        <option value="Nova Andradina"> Nova Andradina </option>
                        <option value="Ponta Porã"> Ponta Porã </option>
                        <option value="Três Lagoas"> Três Lagoas</option>
                    </select>
                    <small id="aviso" class="form-text text-muted">Informe sua data de nascimento</small>

                    <input name="curso" id="curso" class="col-12 col-md-8 form-control" type="text" placeholder="Curso" maxlength="45">

                    <input name="periodo" id="periodo" class="col-12 col-md-8 form-control" type="number" min="1" max="10" placeholder="Período">

                     <select name="turno" id="turno" class="col-12 col-md-8 form-control" required >
                         <option value=""> Turno</option>
                         <option value="Matutino"> Matutino </option>
                         <option value="Vespertino"> Vespertino</option>
                         <option value="Noturno"> Noturno </option>
                         <option value="Integral"> Integral </option>
                     </select>
                    <small class="form-text text-muted">Preencha os campos "Curso", "Período" e "Turno" somente se for aluno do IFMS</small>
                    <input name="email" id="email" class="form-control" type="email" placeholder="Email" required>
                    <input name="telefone"  class="form-control" type="text" placeholder="Telefone" required id="telefone">
                    <input name="cpf" id="cpf" class="col-12 col-md-8 form-control" type="text" placeholder="CPF" minlength=11 maxlength=11 pattern="/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/" required>
                    <input name="rg" id="rg" class="col-12 col-md-8 form-control" type="text" placeholder="RG" required>
                    <small  id="msg" class="form-text text-muted">Preencha o campo "CPF" apenas utilizando números</small>
                    <input name="file" id="file"  type="file">
                    <small id="emailHelp" class="form-text text-muted">Anexe uma cópia do cartão do banco ou documento que comprove o número da conta bancária.</small>
                    <input name="banco" id="banco" class="col-12 col-md-8 form-control" type="text"  placeholder="Banco" required>
                    <input name="agencia" id="agencia" class="col-12 col-md-8 form-control" type="text"  placeholder="Agência" required>
                    <input name="conta" id="conta" class="col-12 col-md-8 form-control" type="text" placeholder="Conta" required>
                    <input name="endereco" id="endereco" class="form-control" type="text" placeholder="Endereço" required >
                    <input name="bairro" id="bairro" class="col-12 col-md-8 form-control" type="text"  placeholder="Bairro" required>
                    <input name="numero" id="numero" class="col-12 col-md-8 form-control" type="text" placeholder="Número" required>
                    <input name="complemento" id="complemento" class="form-control" type="text" placeholder="Complemento" required>
                </div>
                    </div>
        <br>
        <input id="botao"  class="form-control"type="submit" style="color: #2ca02c">
        </form>
    </main>


    <script src="{{ asset ('pages/jquery.js') }}"></script>
    <script src="{{ url(mix('pages/js/cadastro.js')) }}"></script>
    <script src="{{asset('pages/bootstrap.js')}}"></script>
</body>
</html>
