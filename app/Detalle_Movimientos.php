<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Movimientos extends Model
{
    protected $table = 'detalle_movimientos';
    protected $primaryKey = 'id_detalle_movimiento';
    public $timestamps = false;

    protected $fillable = [
        'id_movimiento',
        'id_producto',
        'cantidad',
        'costo',
        'subtotal',
    ];

    protected $guarded = [
    ];
}
