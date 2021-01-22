<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaCorrienteDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_corriente_detalles', function (Blueprint $table) {
            $table->bigIncrements('idcuenta_corriente_detalle');
            $table->integer('idcuenta_corriente')->nullable();
            $table->integer('idarticulo')->nullable();
            $table->decimal('cantidad', 11,2)->nullable();
            $table->decimal('precio_venta', 11,2)->nullable();
            $table->decimal('descuento', 11,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta_corriente_detalles');
    }
}
