<div class="modal modal-success fade in" id="modal-agregar-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Agregar Cliente" class="fa fa-plus-circle"></i> Agregar Cliente</h4>
            </div>
            <div style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;" class="modal-body">
                {!! Form::open(['route' => 'cliente.store', 'method'=>'POST', 'id'=>'agregar_form','autocomplete' => 'off', 'files' => 'true']) !!}
                {{Form::token()}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" required name="nombre" class="form-control" placeholder="Nombre...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Dirección</label>
                                <input type="text" required  name="direccion" class="form-control" placeholder="Dirección...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Documento</label>
                                <select name="tipo_documento" class="form-control">
                                    <option value="DNI">DNI</option>
                                    <option value="RUC">RUC(Personas Juridicas)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="num_documento">Número documento</label>
                                <input type="text"  name="num_documento" class="form-control" placeholder="Número de documento...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text"  name="telefono" class="form-control" placeholder="Teléfono...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email...">
                            </div>
                        </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left  btn-xs" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
                <button type="submit" form="agregar_form" class="btn btn-outline  btn-xs"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>