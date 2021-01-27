
@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Editar Participante</h3>
            </div>
            <form action="{{route('projetos.updateParticipante', $participante->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$participante->nome}}"  placeholder="Nome">
                        @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Data de nascimento</label>
                            <input name="nascimento" value="{{$participante->nascimento}}" type="date" class="form-control @error('nascimento') is-invalid @enderror">
                            @error('nascimento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Telefone</label>
                            <input name="telefone" value="{{$participante->telefone}}" type="text" class="form-control @error('telefone') is-invalid @enderror">
                            @error('telefone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>CPF</label>
                            <input name="cpf" value="{{$participante->cpf}}" type="text" placeholder="xxx.xxx.xxx-xx" class="form-control @error('cpf') is-invalid @enderror">
                            @error('cpf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>RG</label>
                            <input name="rg" type="text" value="{{$participante->rg}}" class="form-control @error('rg') is-invalid @enderror">
                            @error('rg')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="{{$participante->email}}" type="text" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Campus</label>
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

                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Curso</label>
                            <input name="curso" value="{{$participante->curso}}" type="text" class="form-control @error('curso') is-invalid @enderror">
                            @error('curso')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Turno</label>
                            <input name="turno" value="{{$participante->turno}}" type="text" class="form-control @error('turno') is-invalid @enderror">
                            @error('turno')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Período</label>
                            <input name="periodo" value="{{$participante->periodo}}" type="text" class="form-control @error('periodo') is-invalid @enderror">
                            @error('periodo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input name="endereco" value="{{$participante->endereco}}" class="form-control @error('endereco') is-invalid @enderror" placeholder="Endereço">
                        @error('endereco')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </section>
@endsection


