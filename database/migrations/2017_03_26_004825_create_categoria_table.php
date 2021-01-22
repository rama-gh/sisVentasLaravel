<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('idcategoria')->comment('id categoría');
            $table->string('nombre', 50)->comment('nombre de la categoría');
            $table->string('descripcion', 256)->nullable()->comment('nombre de la categoría');
            $table->boolean('condicion')->comment('condicion de la categoría (si esta borrada o no)');
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
        Schema::dropIfExists('categoria');
    }
}
