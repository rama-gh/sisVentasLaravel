<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('idventa')->comment('id de la venta');
            $table->integer('idcliente')->unsigned()->comment('relación de la venta con el cliente');

            $table->integer('idusuario')->unsigned()->comment('relación de la venta con el usuario');

            $table->string('tipo_comprobante',30)->nullable()->comment('tipo de comprobante de la venta');

            $table->string('num_comprobante',30)->nullable()->comment('numero de la venta');
            
            $table->date('fecha_hora')->comment('fecha de la venta');
            $table->decimal('impuesto',4 , 2)->comment('impuesto de la venta');
            $table->decimal('total_venta',11 , 2)->comment('total de la venta');
            $table->decimal('paga',11 , 2)->comment('cuanto es el total de la venta');
            $table->string('estado',20)->comment('estado de la venta');
            $table->timestamps();
            $table->foreign('idcliente')
                  ->references('idpersona')->on('persona');
            $table->foreign('idusuario')
                  ->references('id')->on('users');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
