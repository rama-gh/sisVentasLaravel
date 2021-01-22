<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';

    protected $primaryKey='idpersona';

    protected $fillable=[
    	'tipo_persona',
    	'nombre',
    	'tipo_documento',
    	'num_documento',
    	'direccion',
    	'telefono', 
    	'email'
    ];

    public function ventas()
    {
        return $this->hasMany('SisVentaNew\Venta', 'idcliente', 'idpersona');
    }

    public function ingresos()
    {
        return $this->hasMany('SisVentaNew\Ingreso', 'idproveedor', 'idpersona');
    }


}