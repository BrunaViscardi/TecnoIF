<!DOCTYPE html>
<html>
@includeIf('Painel.Layout.head')

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">
            @includeIf('Painel.Layout.header')

             @includeIf('Painel.Layout.sidebar_lateral')


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
    @includeIf('Painel.Layout.footer')
    </div>

</div>
@includeIf('Painel.Layout.javascript')

</body>
</html>
