<div class="modal modal-success fade in" id="modal-agregar-articulo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Agregar Artículo" class="fa fa-plus-circle"></i> Agregar Artículo</h4>
            </div>
            <div style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;" class="modal-body">
                {!! Form::open(['route' => 'articulo.store', 'method'=>'POST', 'id'=>'agregar_form','autocomplete' => 'off', 'files' => 'true']) !!}
                {{Form::token()}}
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" required name="nombre" class="form-control" placeholder="Nombre del artículo...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Categoría</label>
                            <select name="idcategoria" class="form-control">
                                @foreach ($categorias as $cat)
                                    <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Codígo</label>
                            <input type="text" name="codigo" class="form-control" placeholder="Codígo del artículo...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" disabled required class="form-control" placeholder="El stock debe cargarse en el INGRESO.">
                            <input type="hidden" required  value="0.00" name="stock" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" name="descripcion" class="form-control" placeholder="Descripción del artículo...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" onchange="control(this)" accept="image/*" class="form-control">
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