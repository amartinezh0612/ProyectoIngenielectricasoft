<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->integer('id_roll');
            $table->string('numero_documento');
            $table->string('nombre_usuario');
            $table->string('apellido_usuario');
            $table->string('correo_electronico');
            $table->string('telefono');
            $table->string('contrasena');
            $table->string('estado');
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('usuarios');
    }
}
