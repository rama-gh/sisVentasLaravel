<html>
<head>
  <meta charset="utf-8">
  <style>
  body {font-family: Arial, Helvetica, sans-serif;}

  table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 12px;    margin: 45px;     width: 480px; text-align: left;    border-collapse: collapse; margin-right:auto;
  margin-left:auto; }

  th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

    td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
      color: #669;    border-top: 1px solid transparent; }

      tr:hover td { background: #d0dafd; color: #339; }
      </style>
    </head>
    <body>
      <table>
        <caption>Todas Las Categorías</caption>
        <tr>
          <th>Numero</th>
          <th>Nombre</th>
          <th>Descripción</th>
        </tr>
        @foreach ($categoria as $cat)
          <tr>
            <td>{{ $cat->idcategoria}}</td>
            <td>{{ $cat->nombre}}</td>
            <td>{{ $cat->descripcion}}</td>
          </tr>
        @endforeach
      </table>
    </body>
</html>
