<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id_pedido');
            $table->increments('id_proveedor');
            $table->date('fecha_elaboracion');
            $table->date('fecha_inicio_pedido');
            $table->date('fecha_final_pedido');
            $table->float('monto_total');
            $table->string('tipo_movimiento');
            $table->string('tipo_salida');

            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
