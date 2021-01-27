<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('pages/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('pages/style.css')}}">
    <title>TecnoIF</title>
</head>
<body>
<main role="main">
    <div class="container-brant" id="cabecalho">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand " href="#"> <img id="LogoCabecalho" src="{{ asset('img/TecnoIF.png') }}"
                                                    alt="logo TecnoIF"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.instagram.com/ifmscg/?igshid=1mn46ve39rvhy"> <img
                                id="redeSocial" src="{{ asset('img/i.png') }}"  alt="logo Instagram"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://pt-br.facebook.com/tecnoif/">
                            <img id="redeSocial" src="{{ asset('img/f.png') }}" alt="logo Facebook"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.youtube.com/channel/UC_DLD3-ADKtoa6j-EUTqTvg"> <img
                                id="redeSocial" src="{{ asset('img/y.png') }}" alt="logo youtube"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://linktr.ee/TecnoIF"> <img
                                id="redeSocial" src="{{ asset('img/L.png') }}" alt="logo LinkedIn"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/painel/home">Fazer login</a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>

    <br>
    <br>
    <br>
    <main role="main">


        <div class="container marketing">

            <div class="row">
                <div class="col-lg-4">

                    <svg fill="#343a40" width="140" height="140" viewBox="0 0 16 16"
                         class="bi bi-file-earmark-text-fill" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                    </svg>

                    <h3>Editais</h3>
                    <p>Seleção de projetos de negócios para integrar a TecnoIF.</p>
                    <p>
                        <a target="_blank" href="http://selecao.ifms.edu.br/busca?termo=TecnoIf">
                            <button type="button" class="btn btn-secondary">Visualizar</button>
                        </a>
                    </p>
                </div>
                <div class="col-lg-4">
                    <svg fill="#343a40" width="140" height="140" viewBox="0 0 16 16" class="bi bi-file-earmark-fill"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0H4zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                    </svg>

                    <h3>Documentos</h3>
                    <p>
                        Regimentos, política, programas e regulamentos.
                    </p>
                    <p>  <a href="#" class="card-link" data-toggle="modal" data-target="#siteModalDoc">
                            <button type="button" class="btn btn-secondary">Visualizar</button>
                        </a></p>
                </div>
                <div class="col-lg-4">

                    <svg fill="#343a40" width="140" height="140" viewBox="0 0 16 16" class="bi bi-envelope-open-fill"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l6.709 3.933L8 8.928l1.291.717L16 5.715V5.4a2 2 0 0 0-1.059-1.765l-6-3.2zM16 6.873l-5.693 3.337L16 13.372v-6.5zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516zM0 13.373l5.693-3.163L0 6.873v6.5z"/>
                    </svg>

                    <h3>Contatos</h3>
                    <p>Coordenação geral da TecnoIF e campi</p>
                    <br>
                    <p>
                        <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal">
                            <button type="button" class="btn btn-secondary">Visualizar</button>
                        </a>
                    </p>
                </div>
            </div>
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading" style="text-align: center">Quem somos nós?</h2>
                    <br>
                    <p style="text-align: justify">
                        A TecnoIF - Incubadora Mista e Social de Empresas do IFMS é um agente facilitador do
                        processo de geração e consolidação de empreendimentos inovadores em Mato Grosso do Sul, por
                        meio da formação complementar de empreendedores em áreas compatíveis, em seus aspectos
                        técnicos e gerenciais, com as atividades de ensino, pesquisa e extensão oferecidas pela
                        instituição.

                        É considerada mista por receber tanto ideias de negócios tecnológicos quanto tradicionais,
                        desde que contenham características inovadoras; e social por receber ideias de negócios
                        sociais, empreendimentos que visam não apenas a rentabilidade aos sócios, mas também à
                        transformação social do local onde o mesmo será instalado.

                        Atualmente, atua com a pré-incubação de ideias de negócios de estudantes do IFMS, por meio
                        do pagamento de bolsas mensais durante o período de seis meses. A intenção é que,
                        futuramente, a TecnoIF trabalhe também com incubação de empresas, atendendo inclusive o
                        público externo

                    </p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('img/campidoifms.png') }}" alt="logo Instagram">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading" style="text-align: center">Atividades desenvolvidas</h2>
                    <br>
                    <ul>
                        <li>capacitar os estudantes do IFMS durante a pré-incubação na identificação de
                            oportunidades de mercado;
                        </li>
                        <li>orientar os pré-incubados no planejamento e início de desenvolvimento de seus projetos
                            inovadores;
                        </li>
                        <li>estimular as características e postura empreendedoras, nos pré-incubados da TecnoIF;
                        </li>
                        <li>
                            fornecer oportunidade de formação empreendedora e empresarial aos pré-incubados por meio de parceiros;
                        </li>
                        <li>incentivar a criação de empresas com produtos, serviços e/ou processos inovadores;

                        </li>
                        <li>aproximar o meio acadêmico do mercado de trabalho;

                        </li>
                        <li>promover o desenvolvimento pessoal e profissional dos estudantes do IFMS durante a pré-incubação.

                        </li>
                        <li>organizar e realizar eventos como seminários, palestras, hackathons e minicursos, com o objetivo de disseminar a cultura do empreendedorismo e inovação.

                        </li>



                    </ul>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('img/im1.png') }}" alt="logo Instagram">
                </div>
            </div>

            <hr class="featurette-divider">
        </div>

        <br>
        <br>
        <footer class="container">
            <strong>Copyright &copy; {{date('Y')}} Incubadora de Empresas do IFMS.</strong>
            Todos os direitos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

        <div class="modal fade" id="siteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title "> Contatos</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container ">
                            <div class="row">
                                <div class="col">
                                    <ul class="text-start">
                                        <p> <b>Campi</b></p>
                                        <li> Aquidauana - tecnoif.aq@ifms.edu.br</li>
                                        <li  > Campo Grande - tecnoif.cg@ifms.edu.br</li>
                                        <li> Corumbá - tecnoif.cb@ifms.edu.br</li>
                                        <li> Coxim - tecnoif.cx@ifms.edu.br</li>
                                        <li> Dourados - tecnoif.dr@ifms.edu.br</li>
                                        <li> Jardim - tecnoif.jd@ifms.edu.br</li>
                                        <li> Naviraí - tecnoif.nv@ifms.edu.br</li>
                                        <li> Nova Andradina-tecnoif.na@ifms.edu.br</li>
                                        <li>Três Lagoas - tecnoif.tl@ifms.edu.br</li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul>
                                        <b>Coordenação Geral da TecnoIF</b>
                                        <p>Lilyan Cristaldo</p>

                                        <li> E-mail: tecnoif@ifms.edu.br </li>
                                        <li>  Telefone: (67) 3378-9605</li>

                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="siteModalDoc" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title "> Documentos</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="col-sm-6">
                        <ul>
                            <br>
                            <li>
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/regimentos/regimento-interno-da-tecnoif-incubadora-mista-e-social-de-empresas">
                                    Regimento Interno da TecnoIF;</a></li>
                            <li>
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/politicas/politica-de-inovacao-do-ifms.pdf">Política
                                    de Inovação do IFMS;</a></li>
                            <li>
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/programas/programa-empreendedorismo-inovador-pemin-ifms.pdf">Programa
                                    de Empreendedorismo Inovador (Pemin);</a></li>
                            <li>
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/programas/programainstitucionalincentivoextensaopesquisainovacaoresolucao010de26062014.pdf">Programa
                                    Institucional de Incentivo ao Ensino, Extensão, Pesquisa e Inovação (Piepi);</a></li>
                            <li >
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/regulamentos/regulamento-para-utilizacao-do-cartao-pesquisa-do-ifms.pdf">
                                    Regulamento para Utilização do Cartão Pesquisa;</a></li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar</button>

                    </div>
                </div>
            </div>
        </div>
    </main>
</main>

<script src="{{ asset ('pages/jquery.js') }}"></script>
<script src="{{asset('pages/js/script.js')}}"></script>
<script src="{{asset('pages/bootstrap.js')}}"></script>

</body>

</html>
