<div class="modal modal-danger" aria-hidden="true" role="dialog" tabindex="-1" id="modal_cerrar-{{$arq->idarqueo}}">


    {!!Form::model($arq,['route'=>['arqueo.update', $arq->idarqueo] , 'id'=>'borrar-'.$arq->idarqueo.'', 'method'=>'put'])!!}
    {{Form::token()}}


    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden='true'>x</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-trash"></i> Cerrar Arqueo</h4>
            </div>
            <div class="modal-body"
                 style="overflow-y: auto;background-color: #ffffff !important; color: black !important;">
                <p style="text-align: center">Confirme si desea cerrar el arqueo</p>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left btn-xs" data-dismiss="modal"> <i class="fa fa-window-close"></i> Cancelar</button>
                <button type="submit" form="borrar-{{$arq->idarqueo}}" class="btn btn-outline btn-xs"> <i class="fa fa-save"></i> Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}

</div>