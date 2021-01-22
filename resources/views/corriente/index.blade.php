@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Cuenta Corrientes</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="dev" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Comprobante</th>
                                    <th>Impuesto</th>
                                    <th>Total</th>
                                    <th>Pagado</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                    @foreach($corriente as $cor)
                        @include('corriente.modal-editar')
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
        $('#dev').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            order: [[2, "desc"]],
            ajax: {
                url: "{{route('corriente.tabla')}}",
                type: 'GET'
            },
            columns: [
                {data: 'fecha', name: 'fecha'},
                {data: 'cliente', name: 'cliente'},
                {data: 'comprobante', name: 'comprobante'},
                {data: 'impuesto', name: 'impuesto'},
                {data: 'total_venta', name: 'total_venta'},
                {data: 'pagado', name: 'pagado'},
                {data: 'estado', name: 'estado'},
                {data: 'opcion', name: 'opcion', orderable: false, searchable: false}
            ],
            "language": {
                "url": "{{URL::to('/')}}/admin/Spanish.json"
            }

        });
    </script>
@stop