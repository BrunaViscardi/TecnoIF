<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('Painel.Home')}}" class="brand-link">
        <img src="{{asset('/img/if.png')}}" alt="AdminLTE Logo" class="brand-image "
             style="opacity: .8">
        <span class="brand-text font-weight-light">TecnoIF</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/AdminLTE-3.0.5/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$user->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                        <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('Painel.Home')}}" class="nav-link ">
                                        <i class="fa fa-home nav-icon"></i>
                                        <p>Painel index</p>
                                    </a>
                                </li>
                            @if(Auth::user() && Auth::user()->isCandidato())
                                <li class="nav-item">
                                    <a href="{{route('Painel.PainelCandidato.Candidato')}}" class="nav-link ">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>Gerenciar projeto</p>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{route('Painel.acompanhar')}}" class="nav-link ">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Projetos</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
