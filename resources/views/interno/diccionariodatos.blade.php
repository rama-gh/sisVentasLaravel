@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="text-center">Diccionario De Datos</h3>
        <h3>articulo</h3>
        <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
          <thead>
            <th>Columna</th>
            <th>Tipo</th>
            <th>Nulo</th>
            <th>Predeterminado</th>
            <th>Enlaces a</th>
            <th>Comentarios</th>
            <th>MIME</th>
          </thead>
          <tbody>
            <tr>
              <td>idarticulo <em>(Primaria)</em></td>
              <td>int(10)</td>
              <td>No</td>
              <td></td>
              <td></td>
              <td>id del artículo</td>
              <td></td>
            </tr>
            <tr>
              <td>idcategoria</td>
              <td>int(10)</td>
              <td>No</td>
              <td></td>
              <td>categoria -> idcategoria</td>
              <td>relación entre categoría y artículo</td>
              <td></td>
            </tr>
            <tr>
              <td>codigo</td>
              <td>varchar(50)</td>
              <td>No</td>
              <td></td>
              <td></td>
              <td>código del artículo</td>
              <td></td>
            </tr>
            <tr>
              <td>nombre</td>
              <td>varchar(100)</td>
              <td>No</td>
              <td></td>
              <td></td>
              <td>nombre del artículo</td>
              <td></td>
            </tr>
            <tr>
              <td>stock</td>
              <td>decimal(11,2)</td>
              <td>No</td>
              <td></td>
              <td></td>
              <td>stock del artículo</td>
              <td></td>
            </tr>
            <tr>
              <td>descripcion</td>
              <td>varchar(500)</td>
              <td>Sí</td>
              <td><i>NULL</i></td>
              <td></td>
              <td>descripción del artículo</td>
              <td></td>
            </tr>
            <tr>
              <td>imagen</td>
              <td>varchar(50)</td>
              <td>No</td>
              <td>image.jpg</td>
              <td></td>
              <td>nombre de la imagen del artículo</td>
              <td></td>
            </tr>
            <tr>
              <td>estado</td>
              <td>varchar(20)</td>
              <td>No</td>
              <td></td>
              <td></td>
              <td>estado del artículo (si esta borrado o no)</td>
              <td></td>
            </tr>
            <tr>
              <td>created_at</td>
              <td>timestamp</td>
              <td>Sí</td>
              <td><i>NULL</i></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>updated_at</td>
              <td>timestamp</td>
              <td>Sí</td>
              <td><i>NULL</i></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <h4>Índices</h4>
        <div>
          <div>¡No se ha definido ningún índice!</div>
        </div>
        <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Nombre de la clave</th>
              <th>Tipo</th>
              <th>Único</th>
              <th>Empaquetado</th>
              <th>Columna</th>
              <th>Cardinalidad</th>
              <th>Cotejamiento</th>
              <th>Nulo</th>
              <th>Comentario</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td >PRIMARY</td>
              <td >BTREE</td>
              <td >Sí</td>
              <td >No</td>
              <td>idarticulo</td>
              <td>5</td>
              <td>A</td>
              <td>No</td>
              <td ></td></tr>
              <tr>
                <td >articulo_idcategoria_foreign</td>
                <td >BTREE</td>
                <td >No</td>
                <td >No</td>
                <td>idcategoria</td>
                <td>2</td>
                <td>A</td>
                <td>No</td>
                <td ></td></tr>
              </tbody>
            </table>
            <h3>categoria</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr><th>Columna</th>
                <th>Tipo</th><th>Nulo</th><th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>idcategoria <em>(Primaria)</em></td>
                <td>int(10)</td>
                <td>No</td>
                <td></td>
                <td></td>
                <td>id categoría</td>
                <td></td>
              </tr>
              <tr>
                <td>nombre</td>
                <td>varchar(50)</td><td>No</td><td></td>    <td></td>
                <td>nombre de la categoría</td>
                <td></td>
              </tr>
              <tr>
                <td>descripcion</td>
                <td>varchar(256)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>nombre de la categoría</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>condicion</td>
                <td>tinyint(1)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>condicion de la categoría (si esta borrada o no)</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>idcategoria</td>
                  <td>4</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>

            <h3>config</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>idconfig <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la configuración</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>nombre</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>nombre del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>imagen</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>imagen del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>lema</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>lema del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>dni</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>numero de comuento del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>telefono</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>telefono del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>correo</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>correo del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>impuesto</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>impuesto que tiene el supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idusuario</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>id del usuario que lo modifica</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>alert_minima</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>alerta de los producos minimas</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>alert_maxima</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>alarta de los produtos maximas</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>estadistica_diaz</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>7</td>    <td>
                </td>
                <td>los productos mas vendidos del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>pro_vendidos</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>los productos mas vendidos del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>pro_recaudacion</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>productos con mayor recaudación</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>menu_mini</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>menu del sistema minimisado o maximisado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>direccion</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>direccion del supermercado</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>campo1</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>campo a poner por si hace falta algo</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>campo2</td>
                <td>varchar(500)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>campo a poner por si hace falta algo</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>articulo_paginate</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>7</td>    <td>
                </td>
                <td>paginación de los productos</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>articulo_orden</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>asc</td>    <td>
                </td>
                <td>orden de los productos en la tabla</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>categoria_paginate</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>7</td>    <td>
                </td>
                <td>paginación de las categorias</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>categoria_orden</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>asc</td>    <td>
                </td>
                <td>orden de las categorias en la tabla</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>cliente_paginate</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>7</td>    <td>
                </td>
                <td>paginación de los clientes</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>cliente_orden</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>asc</td>    <td>
                </td>
                <td>orden de los clientes en la tabla</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>proveedores_paginate</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>7</td>    <td>
                </td>
                <td>paginación de los proveedores</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>proveedores_orden</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>asc</td>    <td>
                </td>
                <td>orden de los proveedores en la tabla</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>usuario_paginate</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>7</td>    <td>
                </td>
                <td>paginación de los usuarios</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>usuario_orden</td>
                <td>varchar(500)</td>
                <td>No</td>
                <td>asc</td>    <td>
                </td>
                <td>orden de los usuarios en la tabla</td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>idconfig</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>detalle_estimacion</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>iddetalle_estimacion <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del detalle de la estimacion</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idestimacion</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>estimacion -> idestimacion</td>
                <td>relación de la detalle de la estimacion con la estimacion</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idarticulo</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>articulo -> idarticulo</td>
                <td>relación del detalle de la estimacion con el artículo</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>cantidad</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>cantidad de productos</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>precio_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>precio venta del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>descuento</td>
                <td>decimal(11,2)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>descuento del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>iddetalle_estimacion</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_estimacion_idestimacion_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idestimacion</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_estimacion_idarticulo_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idarticulo</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>

            <h3>detalle_ingreso</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>iddetalle_ingreso <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del detalle del ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idingreso</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>ingreso -> idingreso</td>
                <td>relación del detalle del ingreso con el ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idarticulo</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>articulo -> idarticulo</td>
                <td>relación del detalle del ingreso con el artículo</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>cantidad</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>cantidad de productos</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>precio_compra</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>precio compra del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>precio_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>precio venta del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>iddetalle_ingreso</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_ingreso_idingreso_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idingreso</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_ingreso_idarticulo_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idarticulo</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>

            <h3>detalle_mensual</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>iddetalle_mensual <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del detalle de la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idmensual</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>mensual -> idmensual</td>
                <td>relación del detalle de la venta mensual con la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idarticulo</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>articulo -> idarticulo</td>
                <td>relación del detalle de la venta mensual con el artículo</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>cantidad</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>cantidad de productos</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>precio_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>precio venta del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>descuento</td>
                <td>decimal(11,2)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>descuento del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>iddetalle_mensual</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_mensual_idmensual_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idmensual</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_mensual_idarticulo_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idarticulo</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>detalle_presupuesto</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>iddetalle_presupuesto <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del detalle del presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idpresupuesto</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>presupuesto -> idpresupuesto</td>
                <td>relación del detalle del presupuesto con el presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idarticulo</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>articulo -> idarticulo</td>
                <td>relación del detalle del presupuesto con el artículo</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>cantidad</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>cantidad de productos</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>precio_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>precio venta del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>descuento</td>
                <td>decimal(11,2)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>descuento del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>iddetalle_presupuesto</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_presupuesto_idpresupuesto_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idpresupuesto</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_presupuesto_idarticulo_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idarticulo</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>detalle_venta</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>iddetalle_venta <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del detalle de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idventa</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>venta -> idventa</td>
                <td>relación del detalle de la venta con la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idarticulo</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>articulo -> idarticulo</td>
                <td>relación del detalle del ingreso con el artículo</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>cantidad</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>cantidad de productos</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>precio_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>precio venta del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>descuento</td>
                <td>decimal(11,2)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>descuento del producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>iddetalle_venta</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_venta_idventa_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idventa</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >detalle_venta_idarticulo_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idarticulo</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>estadistica_venta</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>id_estadistica <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la estadistica</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idarticulo</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>articulo -> idarticulo</td>
                <td>relación de los articulos con la estadistica</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>cantidad</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>cantidad de productos</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>precio_venta</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>precio venta de cada producto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>id_estadistica</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >estadistica_venta_idarticulo_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idarticulo</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>estimacion</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>idestimacion <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la estimacion</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idusuario</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>users -> id</td>
                <td>relación del productos con la estimacion</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>fecha_hora</td>
                <td>date</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la estimacion</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>impuesto</td>
                <td>decimal(4,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la estimacion</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>total_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la estimacion</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>estado</td>
                <td>varchar(20)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la estimacion</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>idestimacion</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >estimacion_idusuario_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idusuario</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>ingreso</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>idingreso <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idproveedor</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>persona -> idpersona</td>
                <td>relación de la persona con el ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>tipo_comprobante</td>
                <td>varchar(20)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>tipo del comprobante del ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>num_comprobante</td>
                <td>varchar(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>numero del ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>fecha_hora</td>
                <td>date</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>fecha del ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>impuesto</td>
                <td>decimal(4,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>impuesto del ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>estado</td>
                <td>varchar(20)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>estado del ingreso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>idingreso</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >ingreso_idproveedor_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idproveedor</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>mensual</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>idmensual <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idcliente</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>persona -> idpersona</td>
                <td>relación de la venta mensual con el cliente</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idusuario</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>users -> id</td>
                <td>relación de la venta mensual con el usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>tipo_comprobante</td>
                <td>varchar(30)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>tipo de comprobante de la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>num_comprobante</td>
                <td>varchar(30)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>numero de la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>fecha_hora</td>
                <td>date</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>fecha de la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>impuesto</td>
                <td>decimal(4,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>impuesto de la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>total_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>total de la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>estado</td>
                <td>varchar(20)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>estado de la venta mensual</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>idmensual</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >mensual_idcliente_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idcliente</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >mensual_idusuario_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idusuario</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>migrations</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>id <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>migration</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>batch</td>
                <td>int(11)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>id</td>
                  <td>21</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>password_resets</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>email</td>
                <td>varchar(100)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>email para recuperar contraseña</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>token</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>token del usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >password_resets_email_index</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>email</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>permission_role</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>permission_id <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>permissions -> id</td>
                <td>relación del permiso con el rol</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>role_id <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>roles -> id</td>
                <td>relación del permiso con el rol</td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>permission_id</td>
                  <td>1</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td>role_id</td>
                  <td>1</td>
                  <td>A</td>
                  <td>No</td>
                </tr>
                <tr>
                  <td >permission_role_role_id_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>role_id</td>
                  <td>1</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>permissions</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>id <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del permiso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>name</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>nombre del permiso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>display_name</td>
                <td>varchar(255)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>nombre del permiso para mostrar</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>description</td>
                <td>varchar(255)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>descriptión del permiso</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>id</td>
                  <td>1</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>persona</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>idpersona <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la persona</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>tipo_persona</td>
                <td>varchar(50)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>tipo de la persona</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>nombre</td>
                <td>varchar(100)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>nombre de la persona</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>tipo_documento</td>
                <td>varchar(20)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>tipo de documento de la persona</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>num_documento</td>
                <td>varchar(20)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>numero del documento de la persona</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>direccion</td>
                <td>varchar(100)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>dirección de la persona</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>telefono</td>
                <td>varchar(20)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>teléfono de la persona</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>email</td>
                <td>varchar(70)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>correo de la persona</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>idpersona</td>
                  <td>9</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>presupuesto</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>idpresupuesto <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idcliente</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>persona -> idpersona</td>
                <td>relación del presupuesto con el cliente</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idusuario</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>users -> id</td>
                <td>relación del presupuesto con el usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>tipo_comprobante</td>
                <td>varchar(30)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>tipo de comprobante del presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>num_comprobante</td>
                <td>varchar(30)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>numero del presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>fecha_hora</td>
                <td>date</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>fecha del presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>impuesto</td>
                <td>decimal(4,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>impuesto del presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>total_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>total del presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>estado</td>
                <td>varchar(20)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>estado del presupuesto</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>idpresupuesto</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >presupuesto_idcliente_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idcliente</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >presupuesto_idusuario_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idusuario</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>role_user</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>user_id <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>users -> id</td>
                <td>relación del rol con el usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>role_id <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>roles -> id</td>
                <td>relación del rol con el usuario</td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>user_id</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td>role_id</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                </tr>
                <tr>
                  <td >role_user_role_id_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>role_id</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>roles</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>id <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id del rol</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>name</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>nombre del rol</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>display_name</td>
                <td>varchar(255)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>nombre del rol para mostrar</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>description</td>
                <td>varchar(255)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>descriptión del rol</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>id</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>users</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>id <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>name</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>nombre del usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>apellido</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>apellido del usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>estado</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>estado del usuario (Si esta eliminado o no)</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>email</td>
                <td>varchar(100)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>correo del usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>password</td>
                <td>varchar(255)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>contraseña del usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>remember_token</td>
                <td>varchar(100)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>token del usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>id</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >users_email_unique</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>email</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>
            <h3>venta</h3>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <tr>
                <th>Columna</th>
                <th>Tipo</th>
                <th>Nulo</th>
                <th>Predeterminado</th>    <th>Enlaces a</th>
                <th>Comentarios</th>
                <th>MIME</th>
              </tr>
              <tr>
                <td>idventa <em>(Primaria)</em>
                </td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>id de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idcliente</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>persona -> idpersona</td>
                <td>relación de la venta con el cliente</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>idusuario</td>
                <td>int(10)</td>
                <td>No</td>
                <td>
                </td>    <td>users -> id</td>
                <td>relación de la venta con el usuario</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>tipo_comprobante</td>
                <td>varchar(30)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>tipo de comprobante de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>num_comprobante</td>
                <td>varchar(30)</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>numero de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>fecha_hora</td>
                <td>date</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>fecha de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>impuesto</td>
                <td>decimal(4,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>impuesto de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>total_venta</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>total de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>paga</td>
                <td>decimal(11,2)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>cuanto es el total de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>estado</td>
                <td>varchar(20)</td>
                <td>No</td>
                <td>
                </td>    <td>
                </td>
                <td>estado de la venta</td>
                <td>
                </td>
              </tr>
              <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Sí</td>
                <td>
                  <i>NULL</i>
                </td>    <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
            </table>
            <h4>Índices</h4>
            <div>
              <div>¡No se ha definido ningún índice!</div>
            </div>
            <table style="background-color: rgb(217, 237, 247);" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nombre de la clave</th>
                  <th>Tipo</th>
                  <th>Único</th>
                  <th>Empaquetado</th>
                  <th>Columna</th>
                  <th>Cardinalidad</th>
                  <th>Cotejamiento</th>
                  <th>Nulo</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >PRIMARY</td>
                  <td >BTREE</td>
                  <td >Sí</td>
                  <td >No</td>
                  <td>idventa</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >venta_idcliente_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idcliente</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
                <tr>
                  <td >venta_idusuario_foreign</td>
                  <td >BTREE</td>
                  <td >No</td>
                  <td >No</td>
                  <td>idusuario</td>
                  <td>0</td>
                  <td>A</td>
                  <td>No</td>
                  <td >
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </section>
    @endsection
