
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Presupuesto: {{date("d-m-Y", strtotime($estimacion->fecha_hora))}}</title>
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
      display: inline-block;
      font-size: 0.8em;
    }

    #company {
      /*float: right;*/
      text-align: right;
      position: relative;
      right: 20px;
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
          text-align: right !important;
      }
      @page { margin: 100px 50px; }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{URL::to('/')}}/imagenes/letra/p.png">
      </div>
      <h1>Presupuesto: {{date("d-m-Y", strtotime($estimacion->fecha_hora))}}</h1>
      {{-- <div id="company">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div> --}}
      <div>
        <div><span class="textoMayu">{{$config->nombre}}</span> {{$config->lema}}</div>
        <div><span class="textoMayu">Vendedor</span> {{$usuario->name}}  {{$usuario->apellido}}</div>
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

          @foreach ($detalles as $detalle)
          <tr>
            <td>{{date("d-m-Y", strtotime($detalle->created_at))}}</td>
            <td>{{$detalle->articulo}}</td>
            <td class="text-derecha">{{$detalle->cantidad}}</td>
            <td class="text-derecha">{{$detalle->precio_venta}}</td>
            <td class="text-derecha">{{number_format($detalle->descuento, 2, '.', '')}}</td>
            <td class="text-derecha">{{number_format($detalle->cantidad*$detalle->precio_venta-$detalle->descuento, 2, '.', '')}}</td>
          </tr>
          @endforeach
          <tr>
            <td style="border-top: 2px solid #337ab7;">Total:</td>
            <td style="border-top: 2px solid #337ab7;"></td>
            <td style="border-top: 2px solid #337ab7;"></td>
            <td style="border-top: 2px solid #337ab7;"></td>
            <td style="border-top: 2px solid #337ab7;"></td>
            <td class="text-derecha" style="border-top: 2px solid #337ab7;">{{$estimacion->total_venta}}</td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>
