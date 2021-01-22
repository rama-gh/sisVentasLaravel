<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadisticaVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadistica_venta', function (Blueprint $table) {
            $table->increments('id_estadistica')->comment('id de la estadistica');
            $table->integer('idarticulo')->unsigned()->comment('relación de los articulos con la estadistica');
            $table->string('cantidad')->comment('cantidad de productos');
            $table->string('precio_venta')->comment('precio venta de cada producto');
            $table->timestamps();
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
        Schema::dropIfExists('estadistica_venta');
    }
}
