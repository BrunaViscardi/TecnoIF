<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('painel.home')}}" class="brand-link">
        <img src="{{asset('/img/if.png')}}" alt="AdminLTE Logo" class="brand-image "
             style="opacity: .8">
        <span class="brand-text font-weight-light">TecnoIF</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="img-circle elevation-2 bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>

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
                                        <p>Painel index</p>
                                    </a>
                                </li>
                            @if(Auth::user() && Auth::user()->isCandidato())
                                <li class="nav-item">
                                    <a href="{{route('painel.mentorado.dashboard')}}" class="nav-link ">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>Gerenciar projeto</p>
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
