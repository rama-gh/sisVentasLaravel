<div class="modal modal-warning fade in" id="modal-show-{{$pro->idpersona}}" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Historial de ingreso del proveedor: {{$pro->nombre}}" class="fa fa-eye"></i> Historial de ingreso del proveedor: {{$pro->nombre}}</h4>
            </div>
            <div style="overflow-y: auto; background-color: #ffffff !important;color: black !important;" class="modal-body">
                <div  class="table-responsive table-wrapper">
                    <table style="overflow-y: scroll;" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Numero de comprobante</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($pro->ingresos as $ing)
                                <tr>
                                    <th>{{$ing->fecha_hora}}</th>
                                    <th>{{$ing->num_comprobante}}</th>
                                    <th>{{$ing->detalles->sum('precio_compra') * $ing->detalles->sum('cantidad')}} $</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left btn-xs" data-dismiss="modal"><i class="fa fa-window-close"></i> Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>