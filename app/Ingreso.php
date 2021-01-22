<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='ingreso';

    protected $primaryKey='idingreso';

    protected $fillable=[
    	'idproveedor',
    	'tipo_comprobante',
        'num_comprobante',
    	'fecha_hora',
    	'impuesto',
    	'estado'
    ];

    public function detalles()
    {
        return $this->hasMany('SisVentaNew\DetalleIngreso', 'idingreso', 'idingreso');
    }

    public function proveedor()
    {
        return $this->hasOne('SisVentaNew\Persona', 'idpersona', 'idproveedor');
    }
}
