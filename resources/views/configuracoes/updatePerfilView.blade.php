
@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Alterar dados do perfil</h3>
            </div>

            <main role="main">
                <form action="{{route('configuracoes.updatePerfil')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="col-sm">
                            <div class="card-body">
                                <div class="formR">
                                    <div class="form-group col">
                                        <label>Nome
                                            <input value="{{$candidatos->nome}}" type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                                                   placeholder="Nome" name="nome" >

                                            @error('nome')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>

                                <div class="formR">
                                    <div class="form-group col">
                                        <label> Data de Nascimento
                                            <input   name="nascimento" type="date" value="{{$candidatos->data_nascimento}}" class="form-control @error('nascimento') is-invalid @enderror">
                                            @error('nascimento')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col">
                                        <label>Celular
                                            <input placeholder="(xx)xxxxx-xxxx" name="telefone" type="text" value="{{$candidatos->telefone}}" class="form-control @error('telefone') is-invalid @enderror">
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
                                            <input placeholder="xxx.xxx.xxx-xx" type="text" value="{{$candidatos->cpf}}" name="cpf" class="form-control @error('cpf') is-invalid @enderror">

                                            @error('cpf')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </label>
                                    </div>
                                    <div class="form-group col">
                                        <label>RG
                                            <input name="rg" value="{{$candidatos->rg}}" type="text" class="form-control @error('rg') is-invalid @enderror">
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
                                            <input name="email"  value="{{$candidatos->email}}" type="text" class="form-control @error('email') is-invalid @enderror" disabled>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col">
                                        <label>Campus
                                            <select name="campus"   class="form-control @error('campus') is-invalid @enderror">
                                                <option value="{{$candidatos->campus}}">{{$candidatos->campus}}</option>
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
                                            <input value="{{$candidatos->curso}}" name="curso" type="text" class="form-control">
                                        </label>
                                    </div>
                                    <div class="form-group col">
                                        <label>Turno
                                            <select value="{{$candidatos->turno}}" name="turno" class="form-control">
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
                                            <input value="{{$candidatos->periodo}}" name="periodo" type="number" class="form-control" min="1" max="10">
                                        </label>
                                    </div>
                                </div>
                                <div class="formR">
                                    <div class="form-group col">
                                        <label id="anexo" class="btn btn-light " for="fupload" style="text-align: center">Anexe um documento
                                            que comprove seus dados bancarios:
                                            <input value="{{$candidatos->anexo}}" id="fupload" name="anexo" type="file" style="display: none"
                                                   class="@error('anexo') is-invalid @enderror" accept=".png, .jpg, .jpeg, .pdf">
                                            @error('anexo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror</label>
                                    </div>
                                </div>
                                <div class="formR">
                                    <div class="form-group col">
                                        <label>Conta
                                            <input value="{{$candidatos->conta}}" name="conta" type="text" class="form-control @error('conta') is-invalid @enderror">
                                            @error('conta')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col">
                                        <label>Agência
                                            <input value="{{$candidatos->agencia}}" name="agencia" type="text"
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
                                            <input value="{{$candidatos->banco}}" name="banco" type="text" class="form-control @error('banco') is-invalid @enderror">
                                            @error('banco')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="formR">
                                    <div class="form-group col">
                                        <label>Endereço
                                            <input value="{{$candidatos->endereco}}" name="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror">
                                            @error('endereco')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                <div class="formR">
                                    <div class="form-group col">
                                        <label>Bairro
                                            <input value="{{$candidatos->bairro}}" name="bairro" type="text" class="form-control">

                                        </label>
                                    </div>
                                    <div class="form-group col">
                                        <label>Número
                                            <input  value="{{$candidatos->numero}}" name="numero" type="number" class="form-control">
                                        </label>
                                    </div>
                                </div>
                                <div class="formR">
                                    <div class="form-group col">
                                        <label>Complemento
                                            <input value="{{$candidatos->complemento}}" id="input" name="complemento" type="text" class="form-control" >

                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><div class="card-footer" style=" text-align: center">
                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </div>
                </form>
            </main>
        </div>
    </section>
@endsection
