@extends('layouts.app')
@section('content')
    <style>
        .rect-checkbox {
            float: left;
            margin-left: 130px;
        }

        .span {
            margin-left: -180px;
        }
    </style>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Nueva Ingreso</h3>
                        @if (count($errors)>0)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                {!! Form::open(['route' => 'ingreso.store', 'method'=>'POST', 'autocomplete' => 'off'])!!}
                {{Form::token()}}

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="proveedor">Proveedor</label>
                            <select autofocus name="idproveedor" required class="form-control selectpicker" id="idproveedor"
                                    data-live-search="true">
                                <option></option>
                                @foreach($personas as $persona)
                                    <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label>Tipo Comprobante:</label>
                            <input type="text" readonly value="Ingreso" name="tipo_comprobante" class="form-control"
                                   placeholder="Numero Comprobante">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="num_comprobante">Número Comprobante:</label>
                            @if ($ing == '1')
                                <input type="text" readonly value="0-0" name="num_comprobante" class="form-control"
                                       placeholder="Numero Comprobante">
                            @else
                                <input type="text" readonly value="0-{{$ing->idingreso}}" name="num_comprobante"
                                       class="form-control" placeholder="Numero Comprobante">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label>Articulo</label>
                                    <select autofocus name="pidarticulo" class="form-control selectpicker"
                                            id="pidarticulo" data-live-search="true">
                                        <option value="0"></option>
                                        @foreach($articulos as $articulo)
                                            <option value="{{$articulo->idarticulo}}">{{$articulo->codigo}} {{$articulo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" step="0.01" name="pcantidad" id="pcantidad"
                                           class="form-control" placeholder="Cantidad">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label for="precio_compra">Precio Compra</label>
                                    <input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control"
                                           placeholder="Precio Compra">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label for="precio_venta">Precio Venta</label>
                                    <input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control"
                                           placeholder="Precio Venta">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label for="">
                                        <hr></label>
                                    <button type="button" id="bt-add" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Agregar</button>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table id="detalles" class="table">
                                    <thead style="background-color: #A9D0F5">
                                    <th>Opciones</th>
                                    <th>Artículos</th>
                                    <th>Cantidad</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Subtotal</th>
                                    </thead>
                                    <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">$ 0.00</h4></th>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="guardar">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"></input>
                            <button class="btn btn-primary pull-left btn-xs btn-flat" type="submit"><i class="fa fa-save"></i> Guardar </button>
                            <button class="btn btn-danger pull-right btn-xs btn-flat" type="reset"><i class="fa fa-window-close"></i> Cancelar</button>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </section>
@section('js')
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#bt-add').click(function () {
                agregar();
            });
        });
        var cont = 0;
        total = 0;
        subtotal = [];
        total = 0;
        $("#guardar").hide();

        function agregar() {
            idarticulo = $("#pidarticulo").val();
            articulo = $("#pidarticulo option:selected").text();
            cantidad = $("#pcantidad").val();
            precio_compra = $("#pprecio_compra").val();
            precio_venta = $("#pprecio_venta").val();


            if (idarticulo != "" && cantidad != "" && cantidad > 0 && pprecio_compra != "" && precio_venta != "") {
                subtotal[cont] = (cantidad * precio_compra);
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-xs" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="idarticulo[]" value="' + idarticulo + '">' + articulo + '</td><td><input readonly type="number" name="cantidad[]" value="' + cantidad + '"></td><td><input readonly type="number" name="precio_compra[]" value="' + precio_compra + '"></td><td><input readonly type="number" name="precio_venta[]" value="' + precio_venta + '"></td><td>' + subtotal[cont] + '</td></tr>';
                cont++;
                limpiar();
                $('#total').html("$ " + total);
                evaluar();
                $('#detalles').append(fila);

            } else {
                alert("Error al ingresar el detalle del ingreso, revise los datos del artículo");
            }
        }

        function limpiar() {
            $('#pcantidad').val("");
            $('#pstock').val("");
            $('#pdescuento').val("");
            $('#pprecio_venta').val("");
            $('#pprecio_compra').val("");
            $('#pidarticulo').selectpicker('val', '0');
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            $("#total").html("$ " + total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endpush
@endsection
