<div class="modal fade modal-success" id="abrir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Abrir Arqueo</h4>
            </div>
            <div style="overflow-y: auto;background-color: #ffffff !important; color: black !important;" class="modal-body">
                {!! Form::open(['route' => 'arqueo.store', 'method'=>'POST', 'autocomplete' => 'off', 'files' => 'true','id'=>'form_ag' , 'enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="">Cantidad de dinero en Caja</label>
                        <input required type="number" name="cantidad" class="form-control">
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="submit" form="form_ag" class="btn btn-outline  btn-xs"><i class="fa fa-save"></i> Guardar</button>
                <button type="reset" class="btn btn-outline pull-left  btn-xs" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>