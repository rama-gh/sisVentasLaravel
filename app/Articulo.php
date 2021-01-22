<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulo';

    protected $primaryKey='idarticulo';

    protected $fillable=[
    	'idcategoria',
    	'codigo',
    	'nombre',
    	'stock',
    	'descripcion',
    	'imagen',
    	'estado'
    ];

    public function categorias()
    {
        return $this->hasOne('SisVentaNew\Categoria', 'idcategoria', 'idcategoria');
    }

    public function detalleIngresos()
    {
        return $this->hasMany('SisVentaNew\DetalleIngreso', 'idarticulo', 'idarticulo');
    }

    public function detalleVentas()
    {
        return $this->hasMany('SisVentaNew\DetalleVenta',  'idarticulo', 'idarticulo');
    }

    public function detalleDevoluciones()
    {
        return $this->hasMany('SisVentaNew\DevolucionDetalle',  'idarticulo', 'idarticulo');
    }
}
