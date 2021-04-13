<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'id_movimiento';
    public $timestamps = false;

    protected $fillable = [
         'id_obra',
         'id_servicio',
         'tipo_movimiento',
         'monto_total',
     ];

    protected $guarded = [
     ];
}
