<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class MensualEntrega extends Model
{
    protected $table = 'mensual_entregas';

    protected $primaryKey = 'idmensual_entrega';

    protected $fillable = [
        'idmensual',
        'fecha',
        'monto',
    ];
}
