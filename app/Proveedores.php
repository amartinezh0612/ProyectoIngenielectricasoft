<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Proveedores extends Model
{
    //
    protected $table='proveedores';
    protected $primaryKey='id_proveedor';
    public $timestamps=false;

    protected $fillable=[
        'proveedor',
        'telefono',
        'estado',
    ];

    protected $guarded=[

    ];
}
