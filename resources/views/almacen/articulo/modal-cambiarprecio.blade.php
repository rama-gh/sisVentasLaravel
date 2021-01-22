<div class="modal fade modal-success" id="modal-cambiar-{{$art->idarticulo}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"><i class="fa fa-cog"></i> Editar Precios del Artículo: {{$art->nombre}}</h5>
            </div>
            <div style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;" class="modal-body">
                @if (count($art->detalleIngresos) != 0)
                    @foreach ($art->detalleIngresos as $det)
                        @if ($loop->last)
                            @php
                                $precio_compra = $det->precio_compra;
                                $precio_venta = $det->precio_venta;
                            @endphp
                        @endif
                    @endforeach
                @else
                    @php
                        $precio_compra = 0;
                        $precio_venta = 0;

                    @endphp
                @endif

                {!!Form::model($art,['route'=>['cambiar.precio', $art->idarticulo] , 'method'=>'put','id'=>'cambiar-'.$art->idarticulo])!!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Precio Compra</label>
                        <input type="number" name="precio_compra" value="{{$precio_compra}}" class="form-control">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Precio Venta</label>
                        <input type="number" name="precio_venta" value="{{$precio_venta}}" class="form-control">
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left  btn-xs" data-dismiss="modal"> <i class="fa fa-window-close"></i> Cancelar</button>
                @if (count($art->detalleIngresos) != 0)
                    <button type="submit" form="cambiar-{{$art->idarticulo}}" class="btn btn-outline  btn-xs"> <i class="fa fa-save"></i> Guardar</button>
                @endif
            </div>
        </div>
    </div>
</div>