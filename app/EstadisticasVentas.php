<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class EstadisticasVentas extends Model
{
  protected $table='estadistica_venta';

  protected $primaryKey='id_estadistica';

  protected $fillable=[
    'idarticulo',
    'cantidad',
    'precio_venta',
    'created_at'
  ];
}
