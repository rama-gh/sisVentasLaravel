<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimacion', function (Blueprint $table) {
            $table->increments('idestimacion') ->comment('id de la estimacion');
            $table->integer('idusuario')->unsigned()->comment('relación del productos con la estimacion');
            $table->date('fecha_hora')->comment('id de la estimacion');
            $table->decimal('impuesto',4 , 2)->comment('id de la estimacion');
            $table->decimal('total_venta',11 , 2)->comment('id de la estimacion');
            $table->string('estado',20)->comment('id de la estimacion');
            $table->timestamps();
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
        Schema::dropIfExists('estimacion');
    }
}
