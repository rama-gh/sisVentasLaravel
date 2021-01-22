<div class="modal modal-danger fade in" id="modal-borrar-{{$art->idarticulo}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Borrar artículo: {{$art->nombre}}" class="fa fa-trash"></i> Borrar artículo: {{$art->nombre}}</h4>
            </div>
            <div style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;" class="modal-body">
                {!!Form::model($art,['route'=>['articulo.destroy', $art->idarticulo] , 'method'=>'delete', 'id'=>'borrar-'.$art->idarticulo] )!!}
                {{Form::token()}}
                    <h4 style="text-align: center">¿Desea borrar el artículo {{$art->nombre}}?</h4>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left btn-xs" data-dismiss="modal"> <i class="fa fa-window-close"></i> Cancelar</button>
                <button type="submit" form="borrar-{{$art->idarticulo}}" class="btn btn-outline btn-xs"> <i class="fa fa-save"></i> Aceptar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>