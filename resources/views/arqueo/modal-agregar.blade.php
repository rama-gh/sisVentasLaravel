<div class="modal modal-success" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Agregar Arqueo</h4>
            </div>
            <div class="modal-body" style="overflow-y: auto;background-color: #ffffff !important; color: black !important;">
                {!! Form::open(['route' => 'arqueo.store.show', 'method'=>'POST', 'autocomplete' => 'off', 'files' => 'true','id'=>'form_ag' , 'enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Monto</label>
                        <input required type="number"  name="monto" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Tipo de Pago</label>
                        <select name="tipo_pago" class="form-control" >
                            <option value="Ingreso">Ingreso (Salio Dinero de la Caja)</option>
                            <option value="Efectivo">Efectivo (Entro Dinero a la Caja)</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="">Descripción</label>
                        <input required type="text" name="descripcion" class="form-control">
                    </div>
                    <input type="hidden" name="idarqueo" value="{{$id}}">
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left  btn-xs" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
                <button type="submit" form="form_ag" class="btn btn-outline  btn-xs"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>