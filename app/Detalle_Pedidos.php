<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Detalle_Pedidos extends Model
{
    //
    protected $table='detalle_pedidos';
    protected $primaryKey='id_detalle_pedido';
    public $timestamps=false;

    protected $fillable=[
        
        'id_pedido',
        'id_producto',
        'cantidad',
        'costo',
        'subtotal',
        
    ];

    protected $guarded=[

    ];
}
