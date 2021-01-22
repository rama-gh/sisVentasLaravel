<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('idpersona')->comment('id de la persona');
            $table->string('tipo_persona', 50)->comment('tipo de la persona');
            $table->string('nombre', 100)->comment('nombre de la persona');
            $table->string('tipo_documento', 20)->comment('tipo de documento de la persona');
            $table->string('num_documento', 20)->comment('numero del documento de la persona');
            $table->string('direccion', 100)->nullable()->comment('dirección de la persona');
            $table->string('telefono' , 20)->nullable()->comment('teléfono de la persona');
            $table->string('email' , 70)->nullable()->comment('correo de la persona');
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
        Schema::dropIfExists('persona');
    }
}
