@extends('layouts.app')
@section('content')
<style type="text/css" media="print">
#Imprime {
  height: auto;
  width: 310px;
  margin: 0px;
  padding: 0px;
  float: left;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 7px;
  font-style: normal;
  line-height: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
}
@page{
  margin: 0;
}
</style>
<style type="text/css" media="screen">
.left{
  float: left;
  background:blue;
}
.right{
  float: right;
  background:red;
}
.center{
  background:green;
}
</style>
@php
$date = Carbon\Carbon::now('America/Argentina/Mendoza');
@endphp
<div class="page-content">
  <div class="row">
    <div class="col-lg-10">
      <div class="portlet box portlet-pink">
        <div class="portlet-header" style="background-color: #f5f5f5;">
          <div class="caption box-heading" style="color: #777;"><img src="{{ asset('imagenes/config/impresora.png') }}" alt="Product Image" class="img-rounded" width="60">  </div>
          <div class="actions">

          </div>
        </div>
        <div class="portlet-body">
          <p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading box-heading" style="color:#0a819c;" align="center">Total Pago</div>
                    <div class="panel-body"><h4 class="box-heading" align="center" style="color:#5cb85c;">${{$venta->total_venta}}</h4></div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading box-heading" style="color:#0a819c;" align="center">Importe Recibido</div>
                    <div class="panel-body"><h4 class="box-heading" align="center">${{$venta->paga + $venta->tarjeta_debito + $venta->tarjeta_credito}} </h4></div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading box-heading" style="color:#0a819c;" align="center">Cambio</div>
                    <div class="panel-body"><h4 class="box-heading" align="center" style="color: #f2994b;">${{$venta->paga + $venta->tarjeta_debito + $venta->tarjeta_credito - $venta->total_venta}}</h4></div>
                  </div>
                </div>


              </div>
              <div class="col-md-6">
                <div id="Imprime">
                  <div id="ticket">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-----
                    <strong>Sistema Inventario</strong>-----<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Sucursal: '{{$config->nombre}}'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Fecha: '{{$date->format('d-m-y')}} a las {{$date->format('h:i')}}'<br><br>
                    Vendedor: '{{$venta->usuario->name}} {{$venta->usuario->apellido}}'<br>
                    Numero de Factura: '{{$venta->num_comprobante}}'<br>
                    Cliente: {{$venta->nombre}}<br>
                    Direccion: {{$config->direccion}}<br>
                    Tel: {{$config->telefono}}<br>
                    <br>

                    <table width="250" border="0">
                      <thead>
                        <tr>
                          <th style="width: 100%;">Producto  </th>
                          <th style="width: 100%;">Cantidad</th>
                          <th style="width: 100%;">P.U</th>
                          <th style="width: 100%;">Desc.</th>
                          <th style="width: 100%;">Total</th>
                        </tr>
                      </thead>

                      <tbody id="entries">
                        @foreach($venta->detalles as $det)
                          <tr>
                            <td style="width: 100%; text-align: center" class="text-right">{{$det->articulo->nombre}}</td>
                            <td style="width: 100%; text-align: center" class="text-right">{{$det->cantidad}}</td>
                            <td style="width: 100%; text-align: center" class="text-right">${{$det->precio_venta}}</td>
                            <td style="width: 100%; text-align: center" class="text-right">${{$det->descuento}}</td>
                            <td style="width: 100%; text-align: center">${{$det->cantidad*$det->precio_venta-$det->descuento}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>

                        <tr>
                          <th colspan="4" class="text-right"><b>sTotal</b></th>
                          <th class="text-right" id="total">${{$venta->total_venta}}</th>
                        </tr>



                      </tfoot>
                    </table>
                    <div class="clearfix"></div>
                    <br>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¡Gracias por su compra!</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$config->campo1}} </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Argentina, San Rafale, {{$config->direccion}}</p>

                    <br><br>


                    <div class="clearfix"></div>
                    <br>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-md-6">

                    <p><a href="javascript:imprSelec('Imprime')" class="btn btn-info">Impimir Factura</a></p>

                  </div>
                </div>
              </div>

            </div>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@section('js')
  <script src="{{URL::to('/')}}/plantilla/js/imprimirfac.js"></script>
@endsection


@stop
