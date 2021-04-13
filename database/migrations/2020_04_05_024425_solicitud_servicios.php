<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SolicitudServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('solicitudservicios', function (Blueprint $table) {
            $table->increments('id_solicitud_servicio');
            $table->integer('id_usuario');
            $table->integer('id_empleado');
            $table->integer('id_servicio');
            $table->float('costo_servicio');
            $table->date('fecha_solicitud');
            $table->date('fecha_inicio');
            $table->date('fecha_terminacion');
            $table->string('contacto');
            $table->string('direccion_servicio');
            $table->string('telefono_servicio');
            $table->date('fecha_pago');
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
    }
}
