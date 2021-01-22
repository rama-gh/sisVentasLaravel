<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class DetallePresupuesto extends Model
{
    protected $table='detalle_presupuesto';

    protected $primaryKey='iddetalle_presupuesto';

    protected $fillable=[
      'idventa',
      'idarticulo',
      'cantidad',
      'precio_venta',
      'descuento'
    ];
}
