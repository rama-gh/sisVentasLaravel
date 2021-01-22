<div class="modal modal-success" aria-hidden="true" role="dialog" tabindex="-1" id="modal-devo">
    {!! Form::open(['route' => 'devolucion.store', 'method'=>'POST','autocomplete' => 'off']) !!}
    {{Form::token()}}
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden='true'>x</span>
                </button>
                <h4 class="modal-title" ><i class="fa fa-undo"></i> Devolución de productos del cliente: {{$venta->cliente->nombre}}</h4>
            </div>
            <div class="modal-body" style="background-color: #ffffff !important;color: black !important;">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Artículos</th>
                    <th>Cantidad</th>
                    <th>Resta o Suma Stock</th>
                    <th>Descripción</th>
                    </thead>
                    @foreach($venta->detalles as $det)
                        <tr>
                            <td>{{$det->articulo->nombre}} <input type="hidden" name="idarticulo[]" value="{{$det->idarticulo}}"></td>
                            <td class="text-derecha"><input min="0" max="{{$det->cantidad}}" class="form-control" type="number" value="{{$det->cantidad}}" name="cantidad[]"></td>
                            <td class="text-derecha">
                                <select name="suma_resta[]" class="form-control">
                                    <option value="sumar">Sumar al Stock</option>
                                    <option value="restar">No sumar al Stock</option>
                                </select>
                            </td>
                            <td><textarea class="form-control" name="descripcion[]" rows="3">

									</textarea></td>
                        </tr>
                    @endforeach

                </table>

                <input name="idventa" value="{{$venta->idventa}}" type="hidden">
                <input name="num_factura" value="{{$venta->num_comprobante}}" type="hidden">
                <input name="idcliente" value="{{$venta->cliente->idpersona}}" type="hidden">
                <input name="num_comprobante" value="{{count($devo) + 1}}" type="hidden">
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline pull-left  btn-xs" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>
                <button type="submit" class="btn btn-outline  btn-xs"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}

</div>