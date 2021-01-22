<!DOCTYPE html>
<html>
@includeIf('painel.layout.head')

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">
            @includeIf('painel.layout.header')

             @includeIf('painel.layout.sidebar_lateral')


                <div class="content-wrapper">
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                    <div class="col-sm-6">
                                    </div>
                            </div>
                        </div>
                    </div>
                         @yield('content')


    </div>
    @includeIf('painel.layout.footer')
    </div>

</div>
@includeIf('painel.layout.javascript')

</body>
</html>
