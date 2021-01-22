<div class="modal modal-info fade in" id="modal-editar-{{$cat->idcategoria}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Editar categoria: {{$cat->nombre}}"
                                           class="fa fa-edit"></i> Editar categoria: {{$cat->nombre}}</h4>
            </div>
            <div style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;"
                 class="modal-body">
                {!!Form::model($cat,['route'=>['categoria.update', $cat->idcategoria] , 'method'=>'PATCH', 'files'=>'true', 'id'=>'edit-'.$cat->idcategoria] )!!}
                {{Form::token()}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" value="{{$cat->nombre}}" name="nombre" class="form-control"
                                       placeholder="Nombre...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" value="{{$cat->descripcion}}" class="form-control"
                                       placeholder="Descripcion...">
                            </div>
                        </div>
                    </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left btn-xs" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
                <button type="submit" form="edit-{{$cat->idcategoria}}" class="btn btn-outline btn-xs"> <i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>