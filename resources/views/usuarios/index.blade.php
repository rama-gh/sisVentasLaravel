@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">

                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Usuarios del Sistema
                            <button  data-toggle="modal" data-target="#agregar" class="btn btn-xs btn-success"><i data-toggle="tooltip" title="Agregar Usuarios" class="fa fa-plus-circle"></i></button>
                        </h3>
                    </div>
                </div>
                @include('usuarios.modal-agregar')
                @foreach($user as $use)
                    @include('usuarios.modal-editar')
                    @include('usuarios.modal-borrar')
                @endforeach
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="users" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Opciones</th>
                                </tr>
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

        $('#users').DataTable({
            processing: true,
            serverSide: true,
            'iDisplayLength': 10,
            ajax: "{{route('usuarios.tabla')}}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'opcion', name: 'opcion', orderable: false, searchable: false}
            ],
            "language": {
                "url": "{{URL::to('/')}}/admin/Spanish.json"
            }
        });
    </script>
@stop
