<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Usuarios extends Model
{
    //
    protected $table='usuarios';
     protected $primaryKey='id_usuario';
     public $timestamps=false;
 
     protected $fillable=[
         
         'id_rol',
         'numero_documento',
         'nombre_usuario',
         'apellido_usuario',
         'correo_electronico',
         'telefono',
         'contrasena',
         'estado',
     ];
 
     protected $guarded=[
 
     ];
}
