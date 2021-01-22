<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('id usuario');
            $table->string('name')->comment('nombre del usuario');
            $table->string('apellido')->comment('apellido del usuario');
            $table->string('estado')->comment('estado del usuario (Si esta eliminado o no)');
            $table->string('email', 100)->unique()->comment('correo del usuario');
            $table->string('password')->comment('contraseña del usuario');
            $table->rememberToken()->comment('token del usuario');
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
        Schema::dropIfExists('users');
    }
}
