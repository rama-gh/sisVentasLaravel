<div class="modal fade modal-success" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel"><i data-toggle="tooltip" title="Agregar Usuarios" class="fa fa-plus-circle"></i> Agregar Usuario</h5>
            </div>
            <div class="modal-body" style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;">
                {!! Form::open(['route' => 'usuarios.store', 'method'=>'POST', 'autocomplete' => 'off', 'files' => 'true','id'=>'agregar_form' , 'enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Nombre</label>
                        <input required type="text" name="name" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for=""> Apellido</label>
                        <input required type="text" name="apellido" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Correo</label>
                        <input required type="email" name="email" class="form-control">
                    </div>
                    <input type="hidden" name="estado" value="Activo">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Contraseña</label><br>
                        <input type="password" name="password" class="form-control">
                    </div>

                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left  btn-xs" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
                <button type="submit" form="agregar_form" class="btn btn-outline  btn-xs"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>