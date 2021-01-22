<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaCorrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_corrientes', function (Blueprint $table) {
            $table->bigIncrements('idcuenta_corriente');
            $table->integer('idcliente')->nullable();
            $table->string('tipo_comprobante')->nullable();
            $table->string('num_comprobante')->nullable();
            $table->date('fecha_hora')->nullable();
            $table->decimal('total_venta',11 , 2)->nullable();
            $table->decimal('paga',11 , 2)->nullable();
            $table->decimal('impuesto',11 , 2)->nullable();
            $table->decimal('tarjeta_debito',11 , 2)->nullable();
            $table->decimal('tarjeta_credito',11 , 2)->nullable();
            $table->decimal('monto_porcentaje',11 , 2)->nullable();
            $table->decimal('porcentaje_credito',11 , 2)->nullable();
            $table->string('estado',20)->nullable();
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
        Schema::dropIfExists('cuenta_corrientes');
    }
}
