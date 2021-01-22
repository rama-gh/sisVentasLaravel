<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class DetalleEstimacion extends Model
{
    protected $table='detalle_estimacion';

    protected $primaryKey='iddetalle_estimacion';

    protected $fillable=[
      'idestimacion',
      'idarticulo',
      'cantidad',
      'precio_venta',
      'descuento'
    ];
}
