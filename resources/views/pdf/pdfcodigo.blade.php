<html>
<head>
  <meta charset="utf-8">
  <title>Artículos</title>
  <style>
  body {font-family: Arial, Helvetica, sans-serif;}
  
  html, body { display: block; }

  table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 12px;    margin: 45px;     width: 480px; text-align: left;    border-collapse: collapse; margin-right:auto;
  margin-left:auto; }
  th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }
  td {
    padding: 6px;
    }
  .izquierda {
                  border-top: dotted ;border-width: 2px;
                  border-left: dotted ;border-width: 2px;
                  border-bottom: dotted ;border-width: 2px;
                  position: relative;
                }
  .derecha{
                  border-top: dotted ;border-width: 2px;
                  border-right: dotted ;border-width: 2px;
                  border-bottom: dotted ;border-width: 2px;

                }
  .tije {
                  width: 20px;
                  margin-top: -13px;
                  margin-left: -15px;

          }
</style>

    </head>
    <body>
      <table>
        <tr>
          <th>Nombre</th>
          <th>Codigo</th>
        </tr>
        @foreach ($articulos as $art)
            <tr>
                <td class="izquierda"><img class="tije" src="{{URL::to('/')}}/imagenes/letra/tijera.png"> {{ $art->nombre}} - {{ $art->categorias->nombre}}</td>
                <td class="derecha">
                  @php
                   echo DNS1D::getBarcodeHTML($art->codigo,"C128");
                  @endphp
                  {{ $art->codigo}}
                </td>
              </tr>
          @endforeach
      </table>
    </body>