
@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Cadastro de Equipe</h3>
            </div>
            <form action="{{route('projetos.createEquipe', $projeto->id)}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input value="{{ old('nome') }}" name="nome" class="form-control @error('nome') is-invalid @enderror"  placeholder="Nome">
                        @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Data de nascimento</label>
                            <input value="{{ old('nascimento') }}" name="nascimento" type="date" class="form-control @error('nascimento') is-invalid @enderror">
                            @error('nascimento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Telefone</label>
                            <input value="{{ old('telefone') }}" placeholder="(xx)xxxxx-xxxx" name="telefone" type="text" class="form-control  @error('telefone') is-invalid @enderror">
                            @error('telefone')
                            <div class="invalid-feedback">
                                {{ $message }}s
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>CPF</label>
                            <input value="{{ old('cpf') }}" placeholder="xxx.xxx.xxx-xx" name="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror">
                            @error('cpf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>RG</label>
                            <input   value="{{ old('rg') }}" name="rg" type="text" class="form-control @error('rg') is-invalid @enderror">
                            @error('rg')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input value="{{ old('email') }}" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
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
                            <option value="Aquidauana" {{ old('campus') == "Aquidauana" ? 'selected' : '' }}>Aquidauana</option>
                            <option value="Campo Grande"  {{ old('campus') == "Campo Grande" ? 'selected' : '' }}>Campo Grande</option>
                            <option value="Corumbá"  {{ old('campus') == "Corumbá" ? 'selected' : '' }}>Corumbá</option>
                            <option value="Coxim"  {{ old('campus') == "Coxim" ? 'selected' : '' }}>Coxim</option>
                            <option value="Dourados" {{ old('campus') == "Dourados" ? 'selected' : '' }}>Dourados</option>
                            <option value="Jardim" {{ old('campus') == "Jardim" ? 'selected' : '' }}>Jardim</option>
                            <option value="Naviraí" {{ old('campus') == "Naviraí" ? 'selected' : '' }}>Naviraí</option>
                            <option value="Nova Andradina" {{ old('campus') == "Nova Andradina" ? 'selected' : '' }}>Nova Andradina</option>
                            <option value="Ponta Porã" {{ old('campus') == "Ponta Porã" ? 'selected' : '' }}>Ponta Porã</option>
                            <option value="Três Lagoas" {{ old('campus') == "Três Lagoas" ? 'selected' : '' }}>Três Lagoas</option>
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
                            <input value="{{ old('curso') }}" name="curso" type="text" class="form-control @error('curso') is-invalid @enderror">
                            @error('curso')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Turno</label>
                            <input value="{{ old('turno') }}" name="turno" type="text" class="form-control @error('turno') is-invalid @enderror">
                            @error('turno')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Período</label>
                            <input value="{{ old('periodo') }}" name="periodo" type="text" class="form-control @error('periodo') is-invalid @enderror">
                            @error('periodo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input value="{{ old('endereco') }}" name="endereco" class="form-control @error('endereco') is-invalid @enderror" placeholder="Endereço">
                        @error('endereco')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer" style="text-align: center">
                    <button type="submit" style="text-align: center" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>
@endsection

