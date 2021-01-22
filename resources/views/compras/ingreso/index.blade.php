@extends('layouts.app')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Ingreso
                            <a href="{{route('ingreso.create')}}">
                                <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Nuevo Ingreso</button>
                            </a>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class='input-group date' id='datetimepicker5'>
                                <input type='date' name="start_date" id="start_date" class="form-control" placeholder="Inicio de Fecha" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class='input-group date' id='datetimepicker7'>
                                <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Final Fecha"/>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <button id="btnFiterSubmitSearch" class="btn btn-info"><i class="fa fa-search"></i> Aplicar Filtro</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <br>
                        <div class="table-responsive">
                            <table id="ing" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Comprobante</th>
                                <th>Impuesto</th>
                                <th>Total Compra</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                    @foreach($ingreso as $ing)
                        @include('compras.ingreso.modal')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#ing').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            order: [[2, "desc"]],
            ajax: {
                url: "{{route('ingreso.tabla')}}",
                type: 'GET',
                data: function (d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                },
            },
            columns: [
                {data: 'fecha', name: 'fecha'},
                {data: 'proveedor', name: 'proveedor'},
                {data: 'comprobante', name: 'comprobante'},
                {data: 'impuesto', name: 'impuesto'},
                {data: 'total_venta', name: 'total_venta'},
                {data: 'estado', name: 'estado'},
                {data: 'opcion', name: 'opcion', orderable: false, searchable: false}
            ],
            "language": {
                "url": "{{URL::to('/')}}/admin/Spanish.json"
            }

        });
        $('#btnFiterSubmitSearch').click(function () {
            $('#ing').DataTable().ajax.reload();
        });
    </script>
@stop