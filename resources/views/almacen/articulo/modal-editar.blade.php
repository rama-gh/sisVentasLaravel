<div class="modal modal-info fade in" id="modal-editar-{{$art->idarticulo}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i data-toggle="tooltip" title="Editar artículo: {{$art->nombre}}" class="fa fa-edit"></i> Editar artículo: {{$art->nombre}}</h4>
            </div>
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
            <div style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;" class="modal-body">
                {!!Form::model($art,['route'=>['articulo.update', $art->idarticulo] , 'method'=>'PATCH', 'files'=>'true', 'id'=>'edit-'.$art->idarticulo] )!!}
                {{Form::token()}}
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" value="{{$art->nombre}}" required name="nombre" class="form-control" placeholder="Nombre del artículo...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Categoría</label>
                            <select name="idcategoria" class="form-control">
                                @foreach ($categorias as $cat)
                                    @if ($art->idcategoria == $cat->idcategoria)
                                        <option selected value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                                    @else
                                        <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Codígo</label>
                            <input type="text"  name="codigo"  value="{{$art->codigo}}" class="form-control" placeholder="Codígo del artículo...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" disabled required class="form-control" placeholder="El stock debe cargarse en el INGRESO.">
                            <input type="hidden" required  value="{{$art->stock}}" name="stock" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" name="descripcion"  value="{{$art->descripcion}}" class="form-control" placeholder="Descripción del artículo...">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" onchange="control(this)" accept="image/*" class="form-control">
                        </div>
                    </div>
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
                <button type="submit" form="edit-{{$art->idarticulo}}" class="btn btn-outline  btn-xs"> <i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>