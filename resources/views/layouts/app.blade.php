<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if (isset($config) == false)
        <title>Ventas</title>
    @else
        <title>@if ($config->nombre !=null) {{$config->nombre}} @endif</title>
    @endif

<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/bootstrap.min.css">
    <!--select con buscador-->
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/bootstrap-select.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/AdminLTE.min.css">
    <!-- DatePicker -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/_all-skins.min.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/breadcrumb.css">
    {{-- tickes  --}}
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/ticket.css">
    {{-- modal de clientes --}}
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/jquery-nicelabel.css">

    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/select2.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/js/datatables/datatables.css">
    {{-- <link rel="stylesheet" href="{{URL::to('/')}}/plantilla/css/manual.css"> --}}
    <style>
        .code {
            height: 60px !important;
        }
    </style>
    <style media="screen">
        #tamañomodal {
            width: 90% !important;
        }

        .modal-content {
            -webkit-border-radius: 0px !important;
            -moz-border-radius: 0px !important;
            border-radius: 5px !important;
        }

        .text-derecha {
            text-align: right !important;
        }

        .content {
            padding: 1px !important;
            padding-left: 1px !important;
            padding-right: 1px !important;
        }
        /* Tooltip */
        .tooltip > .tooltip-inner {
            background-color: #3c8dbc;
            color: #FFFFFF;
            border: 1px solid #000000;
            padding: 5px;
            font-size: 15px;
        }

        /* Tooltip on top */
        .tooltip.top > .tooltip-arrow {
            border-top: 5px solid green;
        }

        /* Tooltip on bottom */
        .tooltip.bottom > .tooltip-arrow {
            border-bottom: 5px solid blue;
        }

        /* Tooltip on left */
        .tooltip.left > .tooltip-arrow {
            border-left: 5px solid red;
        }

        /* Tooltip on right */
        .tooltip.right > .tooltip-arrow {
            border-right: 5px solid black;
        }
    </style>
    @yield('css')
    @toastr_css
</head>

@if (isset($config) == false)
    <body class="hold-transition skin-blue sidebar-mini">
    @else
        @if ($config->menu_mini == '1')
            <body class="skin-blue sidebar-mini sidebar-collapse">
            @else
                <body class="hold-transition skin-blue sidebar-mini">
                @endif
                @endif
                <div class="wrapper">
                    <header class="main-header">
                        <!-- Logo -->
                        <a href="{{ route('home') }}" class="logo">
                            <!-- mini logo for sidebar mini 50x50 pixels -->
                            @if (isset($config) == false)
                                <span>-</span>
                                <!-- logo for regular state and mobile devices -->
                                <span>-</span>
                            @else
                                <span>{{$config->nombre}}</span>
                            @endif
                        </a>
                        <!-- Header Navbar: style can be found in header.less -->
                        <nav class="navbar navbar-static-top">
                            <!-- Sidebar toggle button-->
                            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <div class="navbar-custom-menu">
                                <ul class="nav navbar-nav">
                                    @if (Auth::guest())
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="true">{{Auth::user()->name}} {{ Auth::user()->apellido }}
                                                <span class="caret"></span></a>
                                            <ul style="background-color: #367fa9; border-color: #367fa9;"
                                                class="dropdown-menu" role="menu">
                                                <li>
                                                    <a style="color: #fff;" href="{{ url('/logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Salir</a>
                                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                          style="display: none;">{{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="{{(Request::route()->getName() == 'configuracion') ? 'active' :  '' }}" >
                                            <a href="{{ route('configuracion') }}" ><i class="fa fa-gears"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="main-sidebar">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                @if (Auth::guest())
                                    <li class="active treeview">
                                        <a href="#">
                                            <i class="fa fa-dashboard"></i> <span>Inicio</span>
                                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li class="{{Request::is('login') ? 'active' :  '' }}"><a
                                                        href="{{ route('login') }}"><i class="fa fa-user"></i>Iniciar
                                                    Seción</a></li>
                                            <li class="{{Request::is('register') ? 'active' :  '' }}"><a
                                                        href="{{ route('register') }}"><i class="fa fa-user-plus"></i>Registrarme</a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="treeview
                                        {{ (\Request::route()->getName() == 'arqueo.index') ? 'active' : '' }}
                                            ">
                                        <a href="{{ route('arqueo.index') }}">
                                            <i class="fa fa-history"></i>
                                            <span>Arqueo</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'categoria.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('categoria.index') }}">
                                            <i class="fa fa-bookmark-o"></i>
                                            <span>Categoría</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'articulo.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('articulo.index') }}">
                                            <i class="fa fa-building"></i>
                                            <span>Artículo</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'cliente.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('cliente.index') }}">
                                            <i class="fa fa-users"></i>
                                            <span>Clientes</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'proveedor.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('proveedor.index') }}">
                                            <i class="fa fa-users"></i>
                                            <span>Proveedor</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'corriente.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('corriente.index') }}">
                                            <i class="fa fa-microchip"></i>
                                            <span>Cuenta Corriente</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'venta.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('venta.index') }}">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Ventas</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'ingreso.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('ingreso.index') }}">
                                            <i class="fa fa-briefcase"></i>
                                            <span>Ingresos</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'devolucion.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('devolucion.index') }}">
                                            <i class="fa fa-undo"></i>
                                            <span>Devolución</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                    <li class="treeview {{(Request::route()->getName() == 'usuarios.index') ? 'active' :  '' }} ">
                                        <a href="{{ route('usuarios.index') }}">
                                            <i class="fa fa-user-circle-o"></i>
                                            <span>Usuarios del Sistema</span>
                                        </a>
                                    </li>
                                    <li class="header"></li>
                                @endif
                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <section class="content">
                            @yield('content')
                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->
                    <footer class="main-footer">
                        <div class="pull-right hidden-xs">
                            <b>Version</b> 2.0.0
                        </div>
                        @if (isset($config) == false)
                            <strong>Copyright &copy; 2020 <a href="#">Venta</a>.</strong>
                        @else
                            <strong>Copyright &copy; 2020 <a href="#">@if ($config->nombre !=null) {{$config->nombre}} @endif</a>.</strong>
                        @endif

                    </footer>
                    <div class="control-sidebar-bg"></div>
                </div>
                <!-- ./wrapper -->
                <!-- jQuery 2.2.3 -->
                <script src="{{URL::to('/')}}/plantilla/js/jquery-2.2.3.min.js"></script>
                @stack('scripts')
                <!-- Bootstrap 3.3.6 -->
                <script src="{{URL::to('/')}}/plantilla/js/bootstrap.min.js"></script>
                <!--select con buscador-->
                <script src="{{URL::to('/')}}/plantilla/js/bootstrap-select.min.js"></script>
                <!-- FastClick -->
                <script src="{{URL::to('/')}}/plantilla/js/fastclick.min.js"></script>
                <!-- AdminLTE App -->
                <script src="{{URL::to('/')}}/plantilla/js/app.min.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="{{URL::to('/')}}/plantilla/js/demo.js"></script>
                <!-- DatePicker -->

                {{--@jquery--}}
                @toastr_js
                @toastr_render

                <script src="{{URL::to('/')}}/plantilla/js/jquery.plainmodal.min.js"></script>
                <script src="{{URL::to('/')}}/plantilla/js/modalcliente.js"></script>
                <script src="{{URL::to('/')}}/plantilla/js/graficas.js"></script>
                <script src="{{URL::to('/')}}/plantilla/js/graficas2.js"></script>
                <script src="{{URL::to('/')}}/plantilla/js/morris.min.js"></script>
                <script src="{{URL::to('/')}}/plantilla/js/jquery.nicelabel.js"></script>
                <script src="{{URL::to('/')}}/plantilla/js/select2.js"></script>
                <script src="{{URL::to('/')}}/plantilla/js/datatables/datatables.js"></script>
                @yield('js')
                </body>
</html>
