<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Productos extends Model
{
    //
    protected $table='productos';
    protected $primaryKey='id_producto';
    public $timestamps=false;

    protected $fillable=[

        'id_unidad_medida',
        'descripcion_producto',
        'costo',
        'stock',
        
    ];

    protected $guarded=[

    ];
}
