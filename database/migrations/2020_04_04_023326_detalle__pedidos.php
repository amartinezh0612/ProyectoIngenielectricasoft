<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetallePedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->increments('id_detalle_pedido');
            $table->integer('id_pedido');
            $table->integer('id_producto');
            $table->float('costo');
            $table->float('cantidad');
            $table->float('subtotal');
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
        Schema::dropIfExists('detalle_pedidos');
    }
}
