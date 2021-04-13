<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedidos;
use App\Proveedores;
use App\Productos;
use App\Detalle_Pedidos;
use Illuminate\Support\Facades\Redirect;
use DB;

class PedidosController extends Controller
{
    //definicion de funciones
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $pedidos = DB::table('pedidos')
         ->join('proveedores', 'proveedores.id_proveedor', 'pedidos.id_proveedor')
         ->select('pedidos.*', 'proveedores.proveedor')
         ->orderBy('pedidos.id_pedido', 'desc')
         ->paginate(10);

            return view('pedidos.list', ['pedidos' => $pedidos, 'searchText' => $query]);
        }
    }

    public function create()
    {
        $proveedores = Proveedores::all();
        $productos = Productos::all();

        return view('pedidos.create', compact('proveedores', 'productos'));
    }

    public function show($id)
    {
        return view('pedidos.show', ['pedidos' => Pedidos::findOrFail($id)]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $pedidos = Pedidos::create([
            'id_proveedor' => $input['id_proveedor'],
            'fecha_elaboracion' => $input['fecha_elaboracion'],
            'fecha_inicio_pedido' => $input['fecha_inicio_pedido'],
            'fecha_final_pedido' => $input['fecha_final_pedido'],
            'monto_total' => $input['monto_total'],
            'tipo_movimiento' => $input['tipo_movimiento'],
        ]);
            foreach ($input['id_producto'] as $key => $value) {
                Detalle_Pedidos::create([
                'id_detalle_pedido' => $value,
                'id_pedido' => $pedidos->id_pedido,
                'id_producto' => $input['id_producto'][$key],
                'costo' => $input['costos'][$key],
                'cantidad' => $input['cantidades'][$key],
                'subtotal' => $input['costos'][$key] * $input['cantidades'][$key],
                ]);
                if ($input['tipo_movimiento'] == 'Entrada') {
                    $pro = Productos::find($value);
                    $pro->update(['stock' => $pro->stock + $input['cantidades'][$key]]);
                } elseif ($input['tipo_movimiento'] == 'Devolucion') {
                    $pro = Productos::find($value);
                    $pro->update(['stock' => $pro->stock - $input['cantidades'][$key]]);
                }
            }
            DB::commit();

            return redirect('pedidos')->with('status', '1');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect('pedidos/create')->with('status', $e->getMessage());
        }
    }

    public function pdf(Request $request,$id_pedido)
    {
        $pedidos = Pedidos::join('proveedores','pedidos.id_proveedor','=','proveedores.id_proveedor')
        ->select('pedidos.id_proveedor','pedidos.fecha_elaboracion','pedidos.fecha_inicio_pedido',
        'pedidos.fecha_final_pedido','pedidos.tipo_movimiento','pedidos.monto_total as monto_total','proveedores.proveedor as proveedor','proveedores.telefono as telefono')
        ->where('pedidos.id_pedido','=',$id_pedido)
        ->orderBy('pedidos.id_pedido', 'desc')->get();

        $detalle_pedidos = Detalle_Pedidos::join('productos','detalle_pedidos.id_producto','=','productos.id_producto')
             ->select('detalle_pedidos.costo','detalle_pedidos.cantidad',
             'productos.descripcion_producto as producto')
             ->where('detalle_pedidos.id_pedido','=',$id_pedido)
             ->orderBy('detalle_pedidos.id_pedido', 'desc')->get();

             

        $pdf= \PDF::loadView('pdf.pedidos',['pedidos'=>$pedidos,'detalle_pedidos'=>$detalle_pedidos]);
             return $pdf->download('pedidos.pdf');
    }
}
