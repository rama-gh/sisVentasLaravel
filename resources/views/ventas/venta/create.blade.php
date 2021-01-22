@extends('layouts.app')
@section('content')
    <style>
        .rect-checkbox {
            float: left;
            margin-left: 130px;
        }

        .span {
            margin-left: -161px;
        }
    </style>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Nueva Venta</h3>
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
                {!! Form::open(['route' => 'venta.store', 'method'=>'POST', 'autocomplete' => 'off', 'id'=>'cre', 'onSubmit'=>'return pagos()'])!!}
                {{Form::token()}}
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group" id="clidv">
                            <label for="cliente">Cliente</label>
                            <select name="idcliente" class="form-control selectpicker" id="idcliente" required data-live-search="true">
                                @foreach($personas as $persona)
                                    <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label>Tipo De Venta</label>
                            <select name="tipo_venta" id="tipo_venta" class="form-control">
                                <option value="Cuenta Corriente">Cuenta Corriente</option>
                                <option selected value="Venta Comun">Venta Comun</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label>Tipo Comprobante</label>
                            <select name="tipo_comprobante" class="form-control">
                                <option value="Factura A">Factura A</option>
                                <option value="Factura B">Factura B</option>
                                <option value="Ticket">Ticket</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="num_comprobante">Número Comprobante</label>
                            @if ($ven == '1')
                                <input type="text" readonly value="0-0" name="num_comprobante" class="form-control"
                                       placeholder="Numero Comprobante">
                            @else
                                <input type="text" readonly value="0-{{$ven->idventa}}" name="num_comprobante"
                                       class="form-control" placeholder="Numero Comprobante">
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Articulo</label>
                                        <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo"
                                                data-live-search="true">
                                            <option value="0"></option>
                                            @foreach($articulos as $articulo)
                                                <option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}">{{$articulo->articulo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="number" step=".01" name="pcantidad" id="pcantidad"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" step=".01" disabled name="pstock" id="pstock"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio Venta</label>
                                        <input type="number" step=".01" name="pprecio_venta" id="pprecio_venta"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="descuento">Descuento</label>
                                        <input type="number" step=".01" name="pdescuento" id="pdescuento"
                                               class="form-control" placeholder="Precio Compra">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <button type="button" id="bt-add" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Agregar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead style="background-color: #A9D0F5">
                                            <th>Opciones</th>
                                            <th>Artículos</th>
                                            <th>Cantidad</th>
                                            <th>Precio Venta</th>
                                            <th>Descuento</th>
                                            <th>Subtotal</th>
                                            </thead>
                                            <tbody id="detalles">
                                            </tbody>
                                            <tbody>
                                            <th>TOTAL</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><h4 id="total">$ 0.00</h4><input type="hidden" name="total_venta"
                                                                                 id="total_venta"></th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="form-group">
                                    <h4 style="font-weight: 900;" id="total2"> Total Compra: $ 0.00</h4>
                                </div>
                                <div class="form-group" id="pa1">
                                    <label for="tarjeta_debito">Tarjeta de Debito</label>
                                    <input type="number" form="cre" class="form-control" value="0" id="tarjeta_debito"
                                           placeholder="Tarjeta de Debito" min="0" name="tarjeta_debito">
                                </div>
                                <div class="form-group" id="pa2">
                                    <label for="tarjeta_credito">Tarjeta de Credito</label>
                                    <input type="number" form="cre" class="form-control" value="0" id="tarjeta_credito"
                                           placeholder="Tarjeta de Credito" min="0" name="tarjeta_credito">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group" id="pa1">
                                            <label for="tarjeta_debito">Porcentaje de Credito</label>
                                            <input type="number" form="cre" step="any" onchange="porcentaje()"
                                                   class="form-control" value="0" id="porcentaje_credito"
                                                   name="porcentaje_credito">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group" id="pa1">
                                            <label for="tarjeta_debito">Dinero del Porcentaje</label>
                                            <input type="number" form="cre" step="any" onchange="porcentajeDos()"
                                                   class="form-control" value="0" id="monto_porcentaje"
                                                   name="monto_porcentaje">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="pa3">
                                    <label for="efectivo">Efectivo</label>
                                    <input type="number" form="cre" class="form-control" value="0" id="paga"
                                           placeholder="Efectivo" min="0" name="paga">
                                </div>
                            </div>
                        </div>
                        <div class="" id="mens">

                        </div>
                        <div class="container-fluid" id="guardar">
                            <div class="form-group">
                                <input form="cre" type="hidden" name="_token" value="{{csrf_token()}}">
                                <button form="cre" class="btn btn-primary pull-left btn-xs btn-flat" type="submit"><i class="fa fa-save"></i> Guardar </button>
                                <button form="cre" class="btn btn-danger pull-right btn-xs btn-flat" type="reset"><i class="fa fa-window-close"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="idusuario" value="{{Auth::user()->id}}">
                {!!Form::close()!!}
            </div>
        </div>
    </section>
    @push('scripts')
        <script>

            function porcentaje() {
                var porcentaje_credito = parseFloat($("#porcentaje_credito").val());
                var tarjeta_credito = parseFloat($("#tarjeta_credito").val());

                var result = (porcentaje_credito / 100) * tarjeta_credito;

                var monto_porcentaje = parseFloat($("#monto_porcentaje").val(result)).toFixed(2);
            }

            function porcentajeDos() {
                var monto_porcentaje = parseFloat($("#monto_porcentaje").val());

                var tarjeta_credito = parseFloat($("#tarjeta_credito").val());

                var result = (monto_porcentaje * 100) / tarjeta_credito;

                var porcentaje_credito = parseFloat($("#porcentaje_credito").val(result)).toFixed(2);

            }

            function pagos() {
                var tarjeta_debito = $("#tarjeta_debito").val();
                var tarjeta_credito = $("#tarjeta_credito").val();
                var paga = $("#paga").val();
                var total_venta = $("#total_venta").val();

                var tipo_venta = $("#tipo_venta").val();




                if (tarjeta_debito == '') {
                    tarjeta_debito = 0;
                }
                if (tarjeta_credito == '') {
                    tarjeta_credito = 0;
                }

                if (paga == '') {
                    paga = 0;
                }

                if (tipo_venta == 'Cuenta Corriente')
                {
                    return true;
                }

                var suma = parseInt(paga) + parseInt(tarjeta_credito) + parseInt(tarjeta_debito);

                if (suma == total_venta || suma >= total_venta) {
                    return true;
                } else {
                    if (suma < total_venta && suma != 0) {
                        $("#pa1").removeClass("has-error");
                        $("#pa2").removeClass("has-error");
                        $("#pa3").removeClass("has-error");

                        $("#pa1").addClass("has-success");
                        $("#pa2").addClass("has-success");
                        $("#pa3").addClass("has-success");

                        var mens = '<div class="alert alert-success alert-dismissible">' +
                            '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                            '  <strong>Atención!</strong> Debes ingresar el total de la venta o mayor del monto de la venta. El total de la venta es: <kbd>' + total_venta + '$</kbd> y usted ingreso <kbd>' + suma + '$</kbd>' +
                            '</div>';

                        $('#mens').append(mens);


                    }

                    if (suma == 0) {
                        $("#pa1").removeClass("has-success");
                        $("#pa2").removeClass("has-success");
                        $("#pa3").removeClass("has-success");

                        $("#pa1").addClass("has-error");
                        $("#pa2").addClass("has-error");
                        $("#pa3").addClass("has-error");


                        var mens = '<div class="alert alert-error alert-dismissible">' +
                            '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                            '  <strong>Atención!</strong> Debes ingresar el total de la venta o mayor del monto de la venta. El total de la venta es: <kbd>' + total_venta + '$</kbd> y usted aun no ingreso dinero' +
                            '</div>';
                        $('#mens').append(mens);

                    }

                    return false;
                }


            }


        </script>

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
            $("#pidarticulo").change(mostrarValores);

            function mostrarValores() {
                datosArticulo = document.getElementById('pidarticulo').value.split('_');
                $("#pprecio_venta").val(datosArticulo[2]);
                $("#pstock").val(datosArticulo[1]);
            }

            function agregar() {

                var idarticulo = datosArticulo[0];
                var articulo = $("#pidarticulo option:selected").text();
                var cantidad = $("#pcantidad").val();
                var descuento = $("#pdescuento").val();
                var precio_venta = parseFloat($("#pprecio_venta").val());
                var stock = $("#pstock").val();
                var stock_numero = parseInt(stock);
                var stock_cantidad = parseInt(cantidad);

                if (idarticulo != "" && cantidad != "" && cantidad > 0 && pdescuento != "" && precio_venta != "") {
                    if (stock_numero >= stock_cantidad) {
                        subtotal[cont] = (cantidad * precio_venta - descuento);
                        total = total + subtotal[cont];
                        var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-xs" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="idarticulo[]" value="' + idarticulo + '">' + articulo + '</td><td><input readonly type="number" name="cantidad[]" value="' + cantidad + '"></td><td><input readonly type="number" name="precio_venta[]" value="' + precio_venta + '"></td><td><input readonly type="number" name="descuento[]" value="' + descuento + '"></td><td>' + subtotal[cont] + '</td></tr>';
                        cont++;
                        limpiar();
                        $('#total').html("$ " + total);
                        $('#total2').html("Total Compra: $" + total);
                        $('#total_venta').val(total);
                        evaluar();
                        $('#detalles').append(fila);
                    } else {
                        alert('La cantidad a vender supera el stock');
                    }

                } else {
                    alert("Error al ingresar el detalle de la venta, revise los datos del artículo");
                }
            }

            function limpiar() {
                $('#pcantidad').val("");
                $('#pstock').val("");
                $('#pdescuento').val("");
                $('#pprecio_venta').val("");
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
                $('#total_venta').val(total);
                $("#fila" + index).remove();
                evaluar();
            }
        </script>
    @endpush
@endsection
