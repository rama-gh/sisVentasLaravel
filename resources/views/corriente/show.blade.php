@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="container-fluid">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label for="proveedor">Cliente</label>
                            <p>{{$venta->cliente->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label for="fecha_hora">Fecha</label>
                            <p>{{date("d-m-Y", strtotime($venta->fecha_hora))}}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label>Tipo Comprobante</label>
                            <p>{{$venta->tipo_comprobante}}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label for="num_comprobante">Número Comprobante</label>
                            <p>{{$venta->num_comprobante}}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <label for="num_comprobante">Total Venta</label>
                            <p>{{$venta->total_venta}} $</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  table-responsive">
                            <table class="table table-bordered">
                                <table id="detalles"
                                       class="table table-striped table-bordered table-condensed table-hover">
                                    <thead style="background-color: #A9D0F5">
                                    <th>DD-MM-AAAA</th>
                                    <th>Artículos</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Descuento</th>
                                    <th>Subtotal</th>
                                    </thead>
                                    <tbody>
                                    @foreach($venta->detalles as $det)
                                        <tr>
                                            <td>{{date("d-m-Y", strtotime($det->created_at))}}</td>
                                            <td>{{$det->articulo->nombre}}</td>
                                            <td class="text-derecha">{{$det->cantidad}}</td>
                                            <td class="text-derecha">{{$det->precio_venta}}$</td>
                                            <td class="text-derecha">{{number_format($det->descuento, 2, '.', '')}}$
                                            </td>
                                            <td class="text-derecha">{{number_format($det->cantidad*$det->precio_venta-$det->descuento, 2, '.', '')}}</td>
                                        </tr>
                                    @endforeach
                                    @if ($venta->monto_porcentaje != 0)
                                        <tr>
                                            <td>{{date("d-m-Y", strtotime($venta->fecha_hora))}}</td>
                                            <td>Monton de interes por credito</td>
                                            <td class="text-derecha">1</td>
                                            <td class="text-derecha">{{$venta->monto_porcentaje}}$
                                                ({{$venta->porcentaje_credito}}%)
                                            </td>
                                            <td class="text-derecha">0.00$</td>
                                            <td class="text-derecha">{{$venta->monto_porcentaje}}$</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                    <tbody>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-derecha"><h4>{{number_format($venta->total_venta, 2, '.', '')}}
                                            $</h4></th>
                                    </tbody>
                                    <tbody>
                                    <th>PAGA</th>
                                    <th></th>
                                    <th class="text-derecha"><h5>Debito: {{$venta->tarjeta_debito}} $</h5></th>
                                    <th class="text-derecha"><h5>Credito: {{$venta->tarjeta_credito}} $</h5></th>
                                    <th class="text-derecha"><h5>Efectivo: {{$venta->paga}} $</h5></th>
                                    <th class="text-derecha"><h4>
                                            Total: {{$venta->paga + $venta->tarjeta_credito + $venta->tarjeta_debito + $venta->monto_porcentaje}}
                                            $</h4></th>

                                    </tbody>
                                    <tbody>
                                    <th>CAMBIO</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-derecha">
                                        <h4>{{number_format($venta->paga + $venta->tarjeta_credito + $venta->tarjeta_debito - $venta->total_venta + $venta->monto_porcentaje, 2, '.', '')}}</h4>
                                    </th>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{route('pdf.corriente',$venta->idcuenta_corriente)}}" class="btn btn-xs btn-info pull-left"><i class="fa fa-print"></i> Descargar PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
