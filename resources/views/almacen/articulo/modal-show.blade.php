<div class="modal modal-warning fade in" id="modal-show-{{$art->idarticulo}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Historial del artículo: {{$art->nombre}}"
                                           class="fa fa-eye"></i> Historial del artículo: {{$art->nombre}}</h4>
            </div>
            <div style="overflow-y: auto; background-color: #ffffff !important;color: black !important;"
                 class="modal-body">
                @php
                    $ultimov = $art->detalleVentas->first();
                    $ultimoi = $art->detalleIngresos->first();
                @endphp
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Artículo</th>
                            <th>Codígo</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Precio Venta</th>
                            <th>Precio Compra</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>{{$art->nombre}}</th>
                            <th>{{$art->codigo}}</th>
                            <th>{{$art->stock}}</th>
                            <th>{{$art->categorias->nombre}}</th>
                            @if ($ultimov != null)
                                <th>{{$ultimov['precio_venta']}} $</th>
                            @else
                                <th>0$</th>
                            @endif
                            @if ($ultimoi != null)
                                <th>{{$ultimoi['precio_compra']}} $</th>
                            @else
                                <th>0$</th>
                            @endif

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive table-wrapper">
                    <table style="overflow-y: scroll;" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Tipo</th>
                            <th>Precio Venta</th>
                            <th>Precio Compra</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $todo = collect([$art->detalleVentas,$art->detalleIngresos,$art->detalleDevoluciones])
                            ->collapse()
                            ->sortByDesc(function($ordenar){
                                return $ordenar->created_at;
                            });

                        @endphp
                        @foreach ($todo as $art)
                            <tr style="{{ isset($art->iddetalle_venta) ? 'background: #71f994;' : "" }}
                            {{ isset($art->iddetalle_ingreso) ? 'background:#71daf9' : "" }}
                            {{ isset($art->iddevolucion) ? 'background: #f1a7a7;' : "" }} ">
                                @isset($art->iddetalle_venta)
                                    <th>{{date("d-m-Y", strtotime($art->created_at))}}</th>
                                    <th class="text-derecha">{{number_format($art->cantidad, 2, '.', '')}}</th>
                                    <th scope="row"><span class="label label-success">Venta</span></th>
                                    <th class="text-derecha">{{$art->precio_venta}} $</th>
                                    @isset($art->precio_compra)
                                        <th class="text-derecha">{{$art->precio_compra}} $</th>
                                    @else
                                        <th class="text-derecha"></th>
                                    @endisset
                                    <th class="text-derecha">{{$art->precio_venta*$art->cantidad}} $
                                        <small class="label pull-right bg-green">Entrada</small>
                                    </th>
                                @endisset
                                @isset($art->iddetalle_ingreso)
                                    <th>{{date("d-m-Y", strtotime($art->created_at))}}</th>
                                    <th class="text-derecha">{{number_format($art->cantidad, 2, '.', '')}}</th>
                                    <th scope="row"><span class="label label-info">Ingreso</span></th>
                                    <th class="text-derecha">{{$art->precio_venta}} $</th>
                                    @isset($art->precio_compra)
                                        <th class="text-derecha">{{$art->precio_compra}} $</th>
                                    @else
                                        <th class="text-derecha"></th>
                                    @endisset
                                    <th class="text-derecha">{{$art->precio_compra*$art->cantidad}} $
                                        <small class="label pull-right bg-red">Salida</small>
                                    </th>
                                @endisset
                                @isset($art->iddevolucion)
                                    <th>{{date("d-m-Y", strtotime($art->created_at))}}</th>
                                    <th class="text-derecha">{{number_format($art->cantidad, 2, '.', '')}}</th>
                                    <th scope="row"><span class="label label-warning">Devolución</span></th>
                                    <th class="text-derecha">Mirar en el ultimo ingreso</th>
                                    <th class="text-derecha">{{$art->sube_resta}}</th>
                                    <th class="text-derecha">
                                        <small class="label pull-right bg-red">Devolucion</small>
                                    </th>
                                @endisset
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left btn-xs" data-dismiss="modal"><i
                            class="fa fa-window-close"></i> Cerrar
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>