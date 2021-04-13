<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad_Medida extends Model
{
    //
    protected $table='unidad_medida';
    protected $primaryKey='id_unidad_medida';
    public $timestamps=false;

    protected $fillable=[
        'descripcion_unidad_medida',
    ];

    protected $guarded=[

    ];
}
