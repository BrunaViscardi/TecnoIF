
@extends('painel.layout.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                        <div class="card-header">
                            <h3 class="card-title" style="margin-bottom: 8px">Editais</h3>
                            <div class=" card-tools row">
                                <form action="{{route('editais.filtro')}}" method="GET">
                                    <div class="input-group  input-group-sm col" >
                                        <input type="date" name="data" style="border-color: lightgrey;" value="{{ request()->data }}" class="form-control"
                                               placeholder="Filtrar">
                                        <input type="text" name="filtro" style="border-color: lightgrey;" value="{{ request()->filtro }}" class="form-control float-right"
                                               placeholder="Filtrar">
                                        <div class="input-group-append">
                                            <button type="submit" style="border-color: lightgrey;" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Situação</th>
                                @if(Auth::user() && Auth::user()->isCoordenador())
                                <th>
                                    <a href="{{route('editais.createView')}}"><button class="btn btn-primary float-right" style="margin-right:2%">Cadastrar</button></a>
                                </th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($editais as $edital)
                                <tr>
                                    <td>{{$edital->nome}}</td>
                                    <td>{{$edital->data->format('d/m/Y')}}</td>
                                    @if($edital->situacao == 'Inscrições Abertas')
                                        <td><span class="badge bg-danger">Inscrições Abertas</span></td>
                                    @endif
                                    @if($edital->situacao == 'Período de Avalição')
                                        <td><span class="badge bg-secondary">Período de Avalição</span></td>
                                    @endif
                                    @if($edital->situacao == 'Concluído')
                                        <td><span class="badge bg-success">Edital Concluído</span></td>
                                    @endif
                                    @if($edital->situacao == 'Abertura')
                                        <td><span class="badge bg-warning">Edital de Abertura</span></td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCoordenador())
                                        <td>
                                            <form method="get" action="{{route('editais.updateView',$edital->id )}}">
                                                <a href="{{$edital->link}}" target="_blank">
                                                    <button type="button" class="btn btn-primary btn-sm">Ver</button>
                                                </a>
                                                @csrf

                                                <button type="submit" class="btn btn-warning btn-sm">Editar</button>

                                                <a href="{{route('editais.updateSituacaoView',$edital->id)}}"> <button type="button" class=" btn btn-danger btn-sm">Mudar situação</button></a>

                                            </form>
                                        </td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCandidato())
                                        <td>
                                            <a href="{{$edital->link}}">
                                                <button type="button" class="btn btn-primary btn-sm">ver</button>
                                            </a>
                                            @if($edital->situacao == 'Inscrições Abertas')
                                                <a href={{route('projetos.createView',['id'=>$edital->id])}}>
                                                    <button type="button" class="btn btn-success btn-sm">Inscrição</button>
                                                </a>
                                            @endif
                                        </td>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                        <div class="card-header">
                            {{ $editais->appends(['filtro' => $filtro ?? '', 'data' => $data ?? ''])->links() }}
                        </div>

            </div>
        </div>

        </div>
</section>

@endsection

