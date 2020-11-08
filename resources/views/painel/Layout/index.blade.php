<!DOCTYPE html>
<html>
@includeIf('painel.Layout.head')

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">
            @includeIf('painel.Layout.header')

             @includeIf('painel.Layout.sidebar_lateral')


                <div class="content-wrapper">
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                    <div class="col-sm-6">
                                    </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        @if(isset($urlAtual))
                                        <li class="breadcrumb-item active">{{$urlAtual}}</li>
                                        @else
                                            <h1>ssss</h1>
                                        @endif
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                         @yield('content')


    </div>
    @includeIf('painel.Layout.footer')
    </div>

</div>
@includeIf('painel.Layout.javascript')

</body>
</html>
