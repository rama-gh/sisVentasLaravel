<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Presupuesto extends Model
{
  protected $table='presupuesto';

  protected $primaryKey='idpresupuesto';

  protected $fillable=[
    'idcliente',
    'tipo_comprobante',
    'num_comprobante',
    'fecha_hora',
    'impuesto',
    'total_venta',
    'estado'
  ];

}
