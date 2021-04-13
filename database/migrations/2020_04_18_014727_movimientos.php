<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movimientos extends Migration
{
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id_movimiento');
            $table->integer('id_obra');
            $table->integer('id_servicio');
            $table->string('tipo_movimiento');
            $table->float('monto_total');

            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
