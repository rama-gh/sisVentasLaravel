<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Fecha de la venta: {{date("d-m-Y", strtotime($venta->fecha_hora))}}</title>
    <link/>
    <style rel="stylesheet" media="all" >
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    body {
      position: relative;
      width: 19cm;
      height: 29.7cm;
      margin: 0 auto;
      color: #001028;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;

    }

    #logo {
      text-align: center;
      margin-bottom: 10px;
    }

    #logo img {
      width: 90px;
      border-top: 1px solid #000;
      border-left: 1px solid #000;
      border-right: 1px solid #000;
      border-bottom: 1px solid #000;

    }

    h1 {
      border-top: 1px solid  #337ab7;
      border-bottom: 1px solid  #337ab7;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
      background: url(dimension.png);
    }

    #project {
      float: left;
      position: relative;
      top: -68px;
    }

    #project span {
      color: #5D6975;
      text-align: right;
      width: 52px;
      margin-right: 10px;
      font-size: 0.8em;
    }

    #company {
      /*float: right;*/
      text-align: right;
      position: relative;
      right: 20px;
    }
    #company span {
      color: #5D6975;
      text-align: right;
      width: 52px;
      margin-right: 10px;
      font-size: 0.8em;
    }
    #project div,
    #company div {
      white-space: nowrap;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
      font-size: 1.1em;
    }

    table tr:nth-child(2n-1) td {
      background: #F5F5F5;
    }
    table td.grand {
      border-top: 2px solid #337ab7;;
    }

    #notices .notice {
      color: #5D6975;
      font-size: 1.2em;
    }
    tr:nth-child(even) { background: #ddd }
    tr:nth-child(odd) { background: #fff}
    footer {
      color: #5D6975;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
    .ralla2{
        border-left: 2px solid red;
        position: absolute;
        top:0px;
        right: 600px;
        height: 80px;
        border-color: #2196F3!important;
        color: #000!important;
        background-color: #ddffff!important;
    }
    .textoMayu{
      text-transform: uppercase;
    }
    #footerr {
        position: fixed;
        left: 0px;
        bottom: -100px;
        right: 0px;
        height: 40px;
        border-left: 6px solid red;
        background-color: lightgrey;
        border-color: #2196F3!important;
        color: #000!important;
        background-color: #ddffff!important;
        padding: 0.01em 16px;
        border-radius: 0px 10px 0px 0px;
      }
      #footerr .page:after {
         content: counter(page, upper-number) " Pagína";
      }
      .text-derecha{
          text-align: right;
      }
      @page { margin: 100px 50px; }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{URL::to('/')}}/imagenes/letra/v.png">
      </div>
      <h1>Venta: {{date("d-m-Y", strtotime($venta->fecha_hora))}}</h1>
      <div id="company">
        <div><span class="textoMayu">Cliente</span> {{$venta->cliente->nombre}}</div>
        <div><span class="textoMayu">{{$venta->cliente->tipo_documento}}</span> {{$venta->cliente->num_documento}}</div>
        <div><span class="textoMayu">dirección</span> {{$venta->cliente->direccion}}</div>
        <div><span class="textoMayu">teléfono</span> {{$venta->cliente->telefono}}</div>
        <div><span class="textoMayu">Correo Electronico</span> <a href="mailto:{{$venta->cliente->email}}">{{$venta->cliente->email}}</a></div>
      </div>
      <div id="project" class="clearfix";>
        <div><span class="textoMayu">{{$config->nombre}}</span> {{$config->lema}}</div>
        <div><span class="textoMayu">Vendedor</span> {{$venta->usuario->name}}  {{$venta->usuario->apellido}}</div>
        <div><span class="textoMayu">Direción</span> {{$config->direccion}}</div>
        <div><span class="textoMayu">Teléfono</span> {{$config->telefono}}</div>
        <div><span class="textoMayu">Correo Electronico</span> <a href="mailto:{{$config->correo}}">{{$config->correo}}</a></div>
      </div>
    </header>
    <div id="footerr">
   <p class="page"></p>
   <div class="ralla2"></div>
     <span class="pagina">{{$config->campo1}}</span>
 </div>
    <main>
      <table>
        <thead style="border-top: 2px solid #337ab7;">
          <tr>
            <th>Fecha</th>
            <th>Artículos</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Descuento</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody style="border-top: 2px solid #337ab7;">
          @foreach ($venta->detalles as $det)
          <tr>
            <td>{{date("d-m-Y", strtotime($det->created_at))}}</td>
            <td>{{$det->articulo->nombre}}</td>
            <td class="text-derecha">{{$det->cantidad}}</td>
            <td class="text-derecha">{{$det->precio_venta}}</td>
            <td class="text-derecha">{{number_format($det->descuento, 2, '.', '')}}</td>
            <td class="text-derecha">{{number_format($det->cantidad*$det->precio_venta-$det->descuento, 2, '.', '')}}</td>
          </tr>
          @endforeach
          @if ($venta->monto_porcentaje != 0)
            <tr>
              <td>{{date("d-m-Y", strtotime($venta->fecha_hora))}}</td>
              <td>Monton de interes por credito</td>
              <td class="text-derecha">1</td>
              <td class="text-derecha">{{$venta->monto_porcentaje}}$ ({{$venta->porcentaje_credito}}%)</td>
              <td class="text-derecha">0.00$</td>
              <td class="text-derecha">{{$venta->monto_porcentaje}}$</td>
            </tr>
          @endif
          <tr>
            <th>PAGA</th>
            <th></th>
            <th class="text-derecha" ><h5>Debito: {{$venta->tarjeta_debito}} $</h5></th>
            <th class="text-derecha" ><h5>Credito: {{$venta->tarjeta_credito}} $</h5></th>
            <th class="text-derecha" ><h5>Efectivo: {{$venta->paga}} $</h5></th>
            <th class="text-derecha" ><h4>Total: {{$venta->paga + $venta->tarjeta_credito + $venta->tarjeta_debito + $venta->monto_porcentaje}}  $</h4></th>
          </tr>
          <tr>
            <th>Devuelve</th>
            <th></th>
            <th class="text-derecha"></th>
            <th class="text-derecha"></th>
            <th class="text-derecha"></th>
            <th class="text-derecha"><h4>{{$venta->paga + $venta->tarjeta_credito + $venta->tarjeta_debito + $venta->monto_porcentaje - $venta->total_venta}}  $</h4></th>
          </tr>
          <tr>
            <td style="border-top: 2px solid #337ab7;">Total:</td>
            <td style="border-top: 2px solid #337ab7;"></td>
            <td style="border-top: 2px solid #337ab7;"></td>
            <td style="border-top: 2px solid #337ab7;"></td>
            <td style="border-top: 2px solid #337ab7;"></td>
            <td class="text-derecha" style="border-top: 2px solid #337ab7;">{{$venta->total_venta}}</td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>
