<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class Mensual extends Model
{
      protected $table='mensual';

      protected $primaryKey='idmensual';

      protected $fillable=[
        'idcliente',
        'tipo_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total_venta',
        'estado',
        'updated_at'
      ];
}
