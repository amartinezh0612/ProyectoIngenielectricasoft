<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Obras extends Model
{
    //
    protected $table='obras';
    protected $primaryKey='id_obra';
    public $timestamps=false;

    protected $fillable=[
        'descripcion_obra',
        'estado',
    ];

    protected $guarded=[

    ];
}
