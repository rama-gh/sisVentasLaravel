<div class="modal modal-warning fade in" id="modal-show-{{$cli->idpersona}}" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Historial de compra del cliente: {{$cli->nombre}}" class="fa fa-eye"></i> Historial de compra del cliente: {{$cli->nombre}}</h4>
            </div>
            <div style="overflow-y: auto; background-color: #ffffff !important;color: black !important;" class="modal-body">
                <div  class="table-responsive table-wrapper">
                    <table style="overflow-y: scroll;" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Numero de comprobante</th>
                            <th>Pago con efectivo</th>
                            <th>Pago con debito</th>
                            <th>Pago con tarjeta</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($cli->ventas as $ven)
                                <tr>
                                    <th>{{$ven->fecha_hora}}</th>
                                    <th>{{$ven->num_comprobante}}</th>
                                    <th>{{$ven->paga}} $</th>
                                    <th>{{$ven->tarjeta_debito}} $</th>
                                    <th>{{$ven->tarjeta_credito}} $</th>
                                    <th>{{$ven->total_venta}} $</th>
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