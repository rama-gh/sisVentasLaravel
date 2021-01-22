<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class CuentaCorriente extends Model
{
    protected $table='cuenta_corrientes';
    protected $primaryKey='idcuenta_corriente';
    protected $fillable = [
        'idcliente',
        'tipo_comprobante',
        'num_comprobante',
        'fecha_hora',
        'total_venta',
        'paga',
        'estado',
        'impuesto',
        'tarjeta_debito',
        'tarjeta_credito',
        'monto_porcentaje',
        'porcentaje_credito'
    ];

    public function detalles()
    {
        return $this->hasMany('SisVentaNew\CuentaCorrienteDetalle', 'idcuenta_corriente', 'idcuenta_corriente');
    }

    public function cliente()
    {
        return $this->hasOne('SisVentaNew\Persona', 'idpersona', 'idcliente');
    }
}
