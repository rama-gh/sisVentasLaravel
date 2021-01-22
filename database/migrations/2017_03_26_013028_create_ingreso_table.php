<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->increments('idingreso')->comment('id del ingreso');
            $table->integer('idproveedor')->unsigned()->comment('relación de la persona con el ingreso');
            $table->string('tipo_comprobante', 20)->comment('tipo del comprobante del ingreso');
            $table->string('num_comprobante', 10)->comment('numero del ingreso');
            $table->date('fecha_hora')->comment('fecha del ingreso');
            $table->decimal('impuesto', 4, 2)->comment('impuesto del ingreso');
            $table->string('estado', 20)->comment('estado del ingreso');
            $table->timestamps();
            $table->foreign('idproveedor')
                  ->references('idpersona')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso');
    }
}
