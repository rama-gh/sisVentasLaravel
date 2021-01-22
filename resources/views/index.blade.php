@extends('layouts.app')
@section('css')
    <style>
        .alert-dismissible {
            padding-right: 0px;
        }

        .alert {
            padding: 0px;
            height: 98px !important;
        }
    </style>
@stop
@section('content')

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Acceso Directos o Atajos</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{count($venta)}}</h3>
                        <p>Cantidad de Ventas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="{{route('venta.create')}}" class="small-box-footer">Crear Venta <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{count($ingreso)}}</h3>
                        <p>Cantidad de Compras</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <a href="{{route('ingreso.create')}}" class="small-box-footer">Crear Compra <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3>{{count($articulos)}}</h3>
                        <p>Cantidad de Artículos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <a data-toggle="modal" data-target="#modal-agregar-articulo" href="#" class="small-box-footer">Crear Artículo <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-gray">
                    <div class="inner">
                        <h3>{{count($cliente)}}</h3>
                        <p>Cantidad de Clientes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a data-toggle="modal" data-target="#modal-agregar-cliente" href="#" class="small-box-footer">Crear Cliente <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{count($proveedor)}}</h3>
                        <p>Cantidad de Proveedores</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a data-toggle="modal" data-target="#modal-agregar-proveedor" href="#" class="small-box-footer">Crear Proveedor <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>{{$resultado->sum('data')}}</h3>
                        <p>Total de Ganancias</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-usd"></i>
                    </div>
                    <a data-toggle="modal" data-target="#modal_fecha" href="#" class="small-box-footer">Ver Detalle <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-olive">
                    <div class="inner">
                        <h3>{{count($cuenta)}}</h3>
                        <p>Cuentas Corriente Abiertas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-microchip"></i>
                    </div>
                    <a href="{{route('corriente.index')}}" class="small-box-footer">Ver Cuentas Corriente <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{count($usuarios)}}</h3>
                        <p>Cantidad de Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-circle-o"></i>
                    </div>
                    <a href="{{route('usuarios.index')}}" class="small-box-footer">Ir a Usuarios <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    @include('almacen.articulo.modal-agregar')
    @include('ventas.cliente.modal-agregar')
    @include('compras.proveedor.modal-agregar')
    @include('arqueo.feche-modal')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Productos Faltantes</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @foreach ($aviso as $avisos)
                @if ( $avisos->stock <= 5)
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 ">
                        <div class="alert alert-danger alert-dismissible">
                            @if ( $avisos->stock == 0)
                                <h5>No quedan productos de <abbr title="{{$avisos->nombre}}"><strong>{{$avisos->nombre}}
                                    </abbr></strong></h5>
                            @else
                                <h5>Quedan {{$avisos->stock}} del producto {{$avisos->nombre}}</h5>@endif
                        </div>
                    </div>
                @elseif ($avisos->stock <= 20)
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="alert alert-info alert-dismissible">
                            <h5>Quedan {{$avisos->stock}} productos de <abbr
                                        title="{{$avisos->nombre}}"><strong>{{$avisos->nombre}}</abbr></strong></h5>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- /.box-body -->
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Productos más vendidos</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <div id="donutchart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Productos con mayor recaudación</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <div id="donutchart2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="box box-info">
        <div class="box-header with-border">
            @php
                $cont=0
            @endphp
            @foreach ($promedioventa as $promedioventas)
                @php
                    $cont=$cont + $promedioventas->total_venta
                @endphp
            @endforeach
            <h3 class="box-title">Recaudación de los ultimos 7 días</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart" id="line-chart"></div>
        </div>
        <!-- /.box-body -->
    </div>
    @if ($config == '')
        @include('layouts.modalconfig')
    @endif
@endsection

@section('js')
    <script type="text/javascript">
        $("#myModalNorm").modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });

        function control(f) {
            var ext = ['gif', 'jpg', 'jpeg', 'png'];
            var v = f.value.split('.').pop().toLowerCase();
            for (var i = 0, n; n = ext[i]; i++) {
                if (n.toLowerCase() == v)
                    return
            }
            var t = f.cloneNode(true);
            t.value = '';
            f.parentNode.replaceChild(t, f);
            alert('Debe ser de tipo imagen');
        }

        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                    @foreach ($estadistica as $estadisticas)
                ['{{$estadisticas->nombre}}', {{$estadisticas->cantidad}}],
                @endforeach
            ]);

            var options = {
                title: '',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                    @foreach ($estadistica as $estadisticas)
                ['{{$estadisticas->nombre}}', {{$estadisticas->precio_venta}}],
                @endforeach
            ]);

            var options = {
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                    @foreach ($promedioventa as $promedioventas)
                {
                    x: '{{$promedioventas->fecha_hora}}', item1: {{$promedioventas->total_venta}}},
                @endforeach
            ],
            xkey: 'x',
            ykeys: ['item1'],
            labels: ['Entradas'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto',
        });
    </script>


@endsection
