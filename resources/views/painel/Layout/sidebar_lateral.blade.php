<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('painel.home')}}" class="brand-link">
        <span class="font-weight-light" style="text-align: center"> TecnoIF </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <i  class="fas fa-user-tie size-32 mr-3 img-circle" style="color: #f5f5f5"></i>


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
                                    <a href="{{route('painel.home')}}" class="nav-link ">
                                        <i class="fa fa-home nav-icon"></i>
                                        <p>Página inicial </p>
                                    </a>
                                </li>
                            @if(Auth::user() && Auth::user()->isCandidato())
                                <li class="nav-item">
                                    <a href="{{route('painel.mentorado.dashboard')}}" class="nav-link ">
                                        <i class="fas fa-archive nav-icon"></i>
                                        <p>Gerenciar projeto</p>
                                    </a> </li>
                                <li class="nav-item">
                                    <a href="{{route('painel.mentorado.dashboard')}}" class="nav-link ">
                                        <i class="fas fa-user-cog nav-icon"></i>

                                        <p>Configurações</p>
                                    </a>
                                </li>



                            @else
                                <li class="nav-item">
                                    <a href="{{route('painel.equipe gestora.acompanhar')}}" class="nav-link ">
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
