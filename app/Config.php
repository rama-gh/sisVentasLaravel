<?php

namespace SisVentaNew;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
  public $timestamps = false;
  protected $table='config';
  protected $primaryKey = 'idconfig';
  protected $fillable=[
            'nombre',
            'imagen',
            'lema',
            'dni',
            'telefono',
            'correo',
            'campo1',
            'campo2',
            'impuesto',
            'idusuario',
            'alert_minima',
            'alert_maxima',
            'estadistica_diaz',
            'pro_vendidos',
            'pro_recaudacion',
            'menu_mini',
            'direccion',
            'articulo_paginate' ,
            'articulo_orden',
            'categoria_paginate',
            'categoria_orden',
            'cliente_paginate',
            'cliente_orden',
            'proveedores_paginate',
            'proveedores_orden',
            'usuario_paginate',
            'usuario_orden'
          ];
}
