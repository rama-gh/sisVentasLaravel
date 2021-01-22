@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{URL::to('/')}}/admin/css/jquery.dataTables.min.css">
    <style>
        table.dataTable tfoot th, table.dataTable tfoot td {
            padding: 0px 0px 0px 0px;
            border-top: 1px solid #111;
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Arqueo
                            <a  href="#" data-toggle="modal" data-target="#abrir" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Iniciar Día</a>
                            <a  href="#" data-toggle="modal" data-target="#modal_fecha" class="btn btn-info btn-xs"><i class="fa fa-calculator"></i> Ganancia Mensual</a></h3>
                        <hr>
                    </div>
                </div>
                @include('arqueo.modal-abrir')
                @include('arqueo.feche-modal')
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="arqueo" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>N° Arqueo</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Total día</th>
                                    <th>Opciones</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($arqueo as $arq)
            @include('arqueo.modal-cerrar')
        @endforeach
    </section>
@endsection
@section('js')
    <script src="{{URL::to('/')}}/admin/js/jquery.dataTables.min.js"></script>
    <script>

        $('#arqueo').DataTable({
            processing: true,
            serverSide: true,
            "order": [[0, "desc"]],
            ajax: "{{route('arqueo.tabla')}}",
            columns: [
                {data: 'idarqueo', name: 'idarqueo'},
                {data: 'fecha_hora', name: 'fecha_hora'},
                {data: 'descripcion', name: 'descripcion'},
                {data: 'estado', name: 'estado'},
                {data: 'total_dia', name: 'total_dia'},
                {data: 'opcion', name: 'opcion', orderable: false, searchable: false}
            ],
            "language": {
                "url": "{{URL::to('/')}}/admin/Spanish.json"
            }
        });
    </script>
@endsection