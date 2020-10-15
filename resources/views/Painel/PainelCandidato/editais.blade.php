@extends('Painel.Layout.index')
@section('content')
<section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editais TecnoIF</h3>
            </div>
            <div class="card-body p-0">
                <table class="table ">
                    <thead>
                    <tr>
                        <th style="width: 10px">Ano</th>
                        <th>Edital</th>

                        <th style="width: 40px">Situação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2020</td>
                        <td>Pré-Incubação</td>

                        <td><span class="badge bg-danger">Aberto para inscrições</span></td>
                        <td>
                            <button class="btn btn-primary">Ver</button>
                        </td>
                        <td><a href="{{route('Painel.PainelCandidato.cadastro')}}">
                                <button class="btn btn-success">Inscrição</button>
                            </a></td>
                    </tr>
                    <tr>
                        <td>2020</td>
                        <td>Empresa Junior</td>
                        <td><span class="badge bg-warning">Edital de abertura</span></td>
                        <td>
                            <button class="btn btn-primary">Ver</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2019</td>
                        <td>Pré-incubação</td>
                        <td><span class="badge bg-success">Edital concluído</span></td>
                        <td>
                            <button class="btn btn-primary">Ver</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
