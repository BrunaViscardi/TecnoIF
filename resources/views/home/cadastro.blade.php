<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('pages/css/cadastro.css')}}">
    <link rel="stylesheet" href="{{asset('pages/css/style.css')}}">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/painel/home">Fazer login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <form action="{{route('home.store')}}" method="post">
        @csrf
        <div class="container">
            <div class="col-sm">
                <div class="form-group">
                    <label>Nome
                        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                               placeholder="Nome" name="nome">

                        @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </label>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label> Data de Nascimento
                            <input name="nascimento" type="date"
                                   class="form-control @error('nascimento') is-invalid @enderror">
                            @error('nascimento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Celular
                            <input name="telefone" type="text"
                                   class="form-control @error('telefone') is-invalid @enderror">
                            @error('telefone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>CPF
                            <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror">
                            @error('cpf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>RG
                            <input name="rg" type="text" class="form-control @error('rg') is-invalid @enderror">
                            @error('rg')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Email
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Campus
                            <select name="campus" class="form-control @error('campus') is-invalid @enderror">
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
                            <select name="turno" class="form-control">
                                <option value="">Turno</option>
                                <option value="Integral">Integral</option>
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                                <option value="Noturno">Noturno</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Período
                            <input name="periodo" type="number" class="form-control" min="1" max="10">
                        </label>
                    </div>
                </div>
                <div>
                    <label id="anexo" class="btn btn-light " for="fupload" style="text-align: center">Anexe um documento
                        que comprove seus dados bancarios:
                        <input id="fupload" name="anexo" type="file" style="display: none"
                               class="@error('anexo') is-invalid @enderror" accept=".png, .jpg, .jpeg, .pdf">
                        @error('anexo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror</label>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Conta
                            <input name="conta" type="text" class="form-control @error('conta') is-invalid @enderror">
                            @error('conta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Agência
                            <input name="agencia" type="text"
                                   class="form-control @error('agencia') is-invalid @enderror">
                            @error('agencia')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Banco
                            <input name="banco" type="text" class="form-control @error('banco') is-invalid @enderror">
                            @error('banco')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Endereço
                        <input name="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror">
                        @error('endereco')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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
                            <input name="numero" type="number" class="form-control">
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
