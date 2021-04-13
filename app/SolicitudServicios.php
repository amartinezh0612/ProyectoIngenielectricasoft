<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudServicios extends Model
{
    //
    protected $table='solicitudservicios';
     protected $primaryKey='id_solicitud_servicio';
     public $timestamps=false;

     protected $fillable=[
        'id_usuario',
        'id_empleado',
        'id_servicio',
        'costo_servicio',
        'fecha_solicitud',
        'fecha_inicio',
        'fecha_terminacion',
        'contacto',
        'direccion_servicio',
        'telefono_servicio',
        'fecha_pago',
        'estado',
     ];
 
     protected $guarded=[
 
     ];
}
