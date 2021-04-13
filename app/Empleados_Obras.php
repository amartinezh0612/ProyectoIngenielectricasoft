<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Empleados_Obras extends Model
{
    //
    protected $table='empleados_obras';
    protected $primaryKey='id_empleado_obra';
    public $timestamps=false;

    protected $fillable=[
        
        'id_empleado',
        'id_obra',
    ];

    protected $guarded=[

    ];
}
