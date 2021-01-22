<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 12px;
            margin: 45px;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
            margin-right: auto;
            margin-left: auto;
        }

        th {
            font-size: 13px;
            font-weight: bold;
            padding: 8px;
            color: #000000;
        }

        td {
            padding: 8px;
            border-top: 1px solid transparent;
        }

    </style>
</head>
<body>
<h2 style="text-align: center">Mis Clientes</h2>
<table border="1px">
    <tr>
        <th>Nombre</th>
        <th>Documento</th>
        <th>Teléfono</th>
        <th>Email</th>
    </tr>
    @foreach ($personas as $per)
        <tr>
            <td>{{ $per->nombre}}</td>
            <td>{{ $per->tipo_documento}} - {{$per->num_documento}}</td>
            <td>{{$per->telefono}}</td>
            <td>{{$per->email}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>