<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->increments('iddetalle_ingreso')->comment('id del detalle del ingreso');
            $table->integer('idingreso')->unsigned()->comment('relación del detalle del ingreso con el ingreso');
            $table->integer('idarticulo')->unsigned()->comment('relación del detalle del ingreso con el artículo');
            $table->decimal('cantidad', 11, 2)->comment('cantidad de productos');
            $table->decimal('precio_compra', 11, 2)->comment('precio compra del producto');
            $table->decimal('precio_venta', 11, 2)->comment('precio venta del producto');
            $table->timestamps();
            $table->foreign('idingreso')
                  ->references('idingreso')->on('ingreso');
            $table->foreign('idarticulo')
                  ->references('idarticulo')->on('articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingreso');
    }
}
