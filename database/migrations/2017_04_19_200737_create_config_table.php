<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
          $table->increments('idconfig')->comment('id de la configuración');
          $table->string('nombre' , 500)->nullable()->comment('nombre del supermercado');
          $table->string('imagen' , 500)->nullable()->comment('imagen del supermercado');
          $table->string('lema' , 500)->nullable()->comment('lema del supermercado');
          $table->string('dni' , 500)->nullable()->comment('numero de comuento del supermercado');
          $table->string('telefono' , 500)->nullable()->comment('telefono del supermercado');
          $table->string('correo' , 500)->nullable()->comment('correo del supermercado');
          $table->string('impuesto' , 500)->nullable()->comment('impuesto que tiene el supermercado');
          $table->string('idusuario' , 500)->nullable()->comment('id del usuario que lo modifica');
          $table->string('alert_minima' , 500)->nullable()->comment('alerta de los producos minimas');
          $table->string('alert_maxima' , 500)->nullable()->comment('alarta de los produtos maximas');
          $table->string('estadistica_diaz' , 500)->default('7')->comment('los productos mas vendidos del supermercado');
          $table->string('pro_vendidos' , 500)->nullable()->comment('los productos mas vendidos del supermercado');
          $table->string('pro_recaudacion' , 500)->nullable()->comment('productos con mayor recaudación');
          $table->string('menu_mini' , 500)->nullable()->comment('menu del sistema minimisado o maximisado');
          $table->string('direccion' , 500)->nullable()->comment('direccion del supermercado');
          $table->string('campo1' , 500)->nullable()->comment('campo a poner por si hace falta algo');
          $table->string('campo2' , 500)->nullable()->comment('campo a poner por si hace falta algo');
          $table->string('articulo_paginate' , 500)->default('7')->comment('paginación de los productos');
          $table->string('articulo_orden' , 500)->default('asc')->comment('orden de los productos en la tabla');
          $table->string('categoria_paginate' , 500)->default('7')->comment('paginación de las categorias');
          $table->string('categoria_orden' , 500)->default('asc')->comment('orden de las categorias en la tabla');
          $table->string('cliente_paginate' , 500)->default('7')->comment('paginación de los clientes');
          $table->string('cliente_orden' , 500)->default('asc')->comment('orden de los clientes en la tabla');
          $table->string('proveedores_paginate' , 500)->default('7')->comment('paginación de los proveedores');
          $table->string('proveedores_orden' , 500)->default('asc')->comment('orden de los proveedores en la tabla');
          $table->string('usuario_paginate' , 500)->default('7')->comment('paginación de los usuarios');
          $table->string('usuario_orden' , 500)->default('asc')->comment('orden de los usuarios en la tabla');


        });
    }

    public function down()
    {
        Schema::dropIfExists('config');
    }
}
