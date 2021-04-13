<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleMovimientos extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('detalle_movimientos', function (Blueprint $table) {
            $table->increments('id_detalle_movimiento');
            $table->integer('id_movimiento');
            $table->integer('id_producto');
            $table->float('costo');
            $table->float('cantidad');
            $table->float('subtotal');
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('detalle_movimientos');
    }
}
