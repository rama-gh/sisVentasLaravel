<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class ArqueoDetalle extends Model
{
    protected $table='arqueo_detalles';

    protected $primaryKey='idarqueo_detalle';

    protected $fillable=[
        'idarqueo',
        'cantidad',
        'monto',
        'descuento',
        'tipo_venta',
        'total',
        'tipo_pago'
    ];
}
