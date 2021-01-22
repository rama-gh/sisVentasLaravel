<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class Arqueo extends Model
{
    protected $table='arqueos';

    protected $primaryKey='idarqueo';

    protected $fillable=[
        'usuario',
        'fecha_hora',
        'descripcion',
        'estado',
        'total_dia'
    ];

    public function detalle()
    {
        return $this->hasMany('SisVentaNew\ArqueoDetalle', 'idarqueo', 'idarqueo');
    }
        public function pago()
    {
        return $this->hasMany('SisVentaNew\ArqueoPago', 'idarqueo', 'idarqueo');
    }
}
