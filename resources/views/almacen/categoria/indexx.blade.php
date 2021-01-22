@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Categorías</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Nueva categoría</h3>
                        {!! Form::open(['route' => 'categoria.store', 'method'=>'post']) !!}
                        {{Form::token()}}
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre_ca" name="nombre" class="form-control"
                                   placeholder="Nombre...">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion_ca" class="form-control"
                                   placeholder="Descripcion...">
                        </div>
                        <div class="form-group">
                            <button data-toggle="tooltip" title="Guardar Categoría" class="btn btn-primary btn-xs"
                                    type="submit"><i class="fa fa-save"></i> Guardar
                            </button>
                            <button data-toggle="tooltip" title="Cancelar" class="btn btn-danger btn-xs" type="reset"><i
                                        class="fa fa-window-close"></i> Cancelar
                            </button>
                        </div>
                        {!!Form::close()!!}
                    </div>
                    @foreach($categorias as $cat)
                        @include('almacen.categoria.modal-editar')
                        @include('almacen.categoria.modal-borrar')
                    @endforeach
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="table-responsive">
                            <table id="cat" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th>Nombre</th>
                                <th>Descripción</th>
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
        $('#cat').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 5,
            order: [[0, "desc"]],
            ajax: "{{route('categoria.tabla')}}",
            columns: [
                {data: 'nombre', name: 'nombre'},
                {data: 'descripcion', name: 'descripcion'},
                {data: 'opcion', name: 'opcion', orderable: false, searchable: false}
            ],
            "language": {
                "url": "{{URL::to('/')}}/admin/Spanish.json"
            }
        });
    </script>
@stop
