<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table='devolucions';

    protected $primaryKey='iddevolucion';

    protected $fillable=[
        'num_factura',
        'idcliente',
        'idventa',
        'fecha_devolucion',
        'num_comprobante',
    ];

    public function personas()
    {
        return $this->hasOne('SisVentaNew\Persona', 'idpersona', 'idcliente');
    }
}