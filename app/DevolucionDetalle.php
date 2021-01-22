<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class DevolucionDetalle extends Model
{
    protected $table='devolucion_detalles';

    protected $primaryKey='iddevolucion';

    protected $fillable=[
        'idarticulo',
        'cantidad',
        'sube_resta',
        'descripcion'
    ];
}
