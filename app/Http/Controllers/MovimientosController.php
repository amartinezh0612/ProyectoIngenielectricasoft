<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimientos;
use App\Obras;
use App\Servicios;
use App\Productos;
use App\Detalle_Movimientos;
use Illuminate\Support\Facades\Redirect;
use DB;

class MovimientosController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $movimientos = Movimientos::orderBy('id_movimiento', 'DESC')->paginate();

        return view('movimientos.list', compact('movimientos'));
    }

    public function create()
    {
        $obras = Obras::all();
        $servicios = Servicios::all();
        $productos = Productos::all();

        return view('movimientos.create', compact('obras', 'servicios', 'productos'));
    }

    public function show($id)
    {
        return view('movimientos.show', ['movimientos' => Movimientos::findOrFail($id)]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $movimientos = Movimientos::create([
            'id_obra' => $input['id_obra'],
            'id_servicio' => $input['id_servicio'],
            'tipo_movimiento' => $input['tipo_movimiento'],
            'monto_total' => $input['monto_total'],
        ]);
            foreach ($input['id_producto'] as $key => $value) {
                Detalle_Movimientos::create([
                'id_detalle_movimiento' => $value,
                'id_movimiento' => $movimientos->id_movimiento,
                'id_producto' => $input['id_producto'][$key],
                'costo' => $input['costos'][$key],
                'cantidad' => $input['cantidades'][$key],
                'subtotal' => $input['costos'][$key] * $input['cantidades'][$key],
                ]);
                if ($input['tipo_movimiento'] == 'Entrada') {
                    $pro = Productos::find($value);
                    $pro->update(['stock' => $pro->stock + $input['cantidades'][$key]]);
                } elseif ($input['tipo_movimiento'] == 'Salida') {
                    $pro = Productos::find($value);
                    $pro->update(['stock' => $pro->stock - $input['cantidades'][$key]]);
                }
            }
            DB::commit();

            return redirect('movimientos')->with('status', '1');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect('movimientos/create')->with('status', $e->getMessage());
        }
    }
}
