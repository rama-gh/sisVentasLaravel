@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">

                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Clientes
                            <button  data-toggle="modal" data-target="#modal-agregar-cliente" class="btn btn-xs btn-success"><i data-toggle="tooltip" title="Agregar Cliente" class="fa fa-plus-circle"></i></button>
                            <a href="{{route('pdf.cliente')}}" class="btn btn-primary btn-xs" ><i data-toggle="tooltip" title="Imprimir Clientes"  class="fa fa-fw fa-print"></i></a>
                        </h3>
                    </div>
                </div>
                @include('ventas.cliente.modal-agregar')
                @foreach($personas as $cli)
                    @include('ventas.cliente.modal-editar')
                    @include('ventas.cliente.modal-borrar')
                    @include('ventas.cliente.modal-show')
                @endforeach
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="cli" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th>Nombre</th>
                                <th>Documentp</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Opciones</th>
                                </thead>
                            </table>
                        </div>
                    </div>
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

        $('#cli').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            order: [[0, "desc"]],
            ajax: "{{route('cliente.tabla')}}",
            columns: [
                {data: 'nombre', name: 'nombre'},
                {data: 'documento', name: 'documento'},
                {data: 'telefono', name: 'telefono'},
                {data: 'email', name: 'email'},
                {data: 'opcion', name: 'opcion', orderable: false, searchable: false}
            ],
            "language": {
                "url": "{{URL::to('/')}}/admin/Spanish.json"
            }
        });

    </script>
@stop
