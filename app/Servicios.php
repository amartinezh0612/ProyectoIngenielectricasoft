<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    //
    protected $table='servicios';
     protected $primaryKey='id_servicio';
     public $timestamps=false;
 
     protected $fillable=[
         
         'servicio',
         'costo',
         'estado',
     ];
 
     protected $guarded=[
 
     ];
}
