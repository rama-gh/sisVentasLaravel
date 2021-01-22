<div class="modal modal-danger fade in" id="modal-editar-{{$cor->idcuenta_corriente}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Cancelar cliente: {{$cor->cliente->nombre}}"
                                           class="fa fa-edit"></i> Cancelar cliente: {{$cor->cliente->nombre}}</h4>
            </div>
            <div style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;"
                 class="modal-body">
                {!!Form::model($cor,['route'=>['corriente.update', $cor->idcuenta_corriente] , 'method'=>'post', 'files'=>'true', 'id'=>'edit-'.$cor->idcuenta_corriente] )!!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Pago Efectivo</label>
                            <input type="text" name="paga" value="0.00" class="form-control" placeholder="Pago Efectivo...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Pago Debito</label>
                            <input type="text" name="tarjeta_debito" value="0.00" class="form-control" placeholder="Pago Debito...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Pago Credito</label>
                            <input type="text" name="tarjeta_credito" value="0.00" class="form-control" placeholder="Pago Credito...">
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left  btn-xs" data-dismiss="modal"><i
                            class="fa fa-window-close"></i> Cancelar
                </button>
                <button type="submit" form="edit-{{$cor->idcuenta_corriente}}" class="btn btn-outline  btn-xs"><i
                            class="fa fa-save"></i> Guardar
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>