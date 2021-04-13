<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table='roles';
    protected $primaryKey='id_rol';
    public $timestamps=false;

    protected $fillable=[

        'descripcion_rol',
        'condicion',
    ];

    protected $guarded=[

    ];
}
