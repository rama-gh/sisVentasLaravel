<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->increments('idarticulo')->comment('id del artículo');
            $table->integer('idcategoria')->unsigned()->comment('relación entre categoría y artículo');
            $table->string('codigo', 50)->comment('código del artículo');
            $table->string('nombre', 100)->comment('nombre del artículo');
            $table->decimal('stock', 11,2)->comment('stock del artículo');
            $table->string('descripcion' , 500)->nullable()->comment('descripción del artículo');
            $table->string('imagen', 50)->default('image.jpg')->comment('nombre de la imagen del artículo');
            $table->string('estado', 20)->comment('estado del artículo (si esta borrado o no)');
            $table->timestamps();
            $table->foreign('idcategoria')
                  ->references('idcategoria')->on('categoria');
        });
    }


    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}
