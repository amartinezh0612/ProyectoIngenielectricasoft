<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;

    protected $fillable = [
         'id_proveedor',
         'id_producto',
         'fecha_elaboracion',
         'fecha_inicio_pedido',
         'fecha_final_pedido',
         'monto_total',
         'tipo_movimiento',
         'tipo_salida',
     ];

    protected $guarded = [
     ];
}
