<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Productos;
use App\Unidad_Medida;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductosFormrequest;
use App\Http\Requests\ProductosUpdateFormRequest;
use DB;

class ProductosController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {
         if($request){
            $query=trim($request->get('searchText'));
            $productos=DB::table('productos')
            ->join('unidad_medida','unidad_medida.id_unidad_medida','productos.id_unidad_medida')
            ->select('productos.*','unidad_medida.descripcion_unidad_medida')
            ->where('descripcion_producto','LIKE','%'.$query.'%')
            ->where('costo','LIKE','%'.$query.'%')
            ->where('stock','LIKE','%'.$query.'%')
            ->orderBy('productos.id_producto','desc')
            ->paginate(10);
            return view('productos.list',["productos"=>$productos,"searchText"=>$query]);
        }

    }

    public function create()
    {
        $unidad_medida=Unidad_Medida::all();
         return view("productos.create",compact('unidad_medida'));
    }
   //para hacer registros en la tabla
    public function store(ProductosFormrequest $request)
    {
        $productos= new Productos;
        $productos->id_unidad_medida=$request->get('id_unidad_medida');
        $productos->descripcion_producto=$request->get('descripcion_producto');
        $productos->costo=$request->get('costo');
        $productos->stock=$request->get('stock');
        $productos->save();
        return Redirect::to('productos');
    }

    public function show($id)
    {
        return view ("productos.show",["productos"=>Productos::findOrFail($id)]);
    }

    public function edit($id)
    {
        $unidad_medida=DB::table('unidad_medida')->get();
        $productos=Productos::where('id_producto',$id)->first();
        return view('productos.edit',compact('unidad_medida','productos'));
    }

    public function update(ProductosUpdateFormRequest $request,$id)
    {
        
        $productos=Productos::findOrFail($id);
        $productos->id_unidad_medida=$request->get('id_unidad_medida');
        $productos->descripcion_producto=$request->get('descripcion_producto');
        $productos->costo=$request->get('costo');
        $productos->stock=$request->get('stock');
        $productos->update();
        return Redirect::to('productos');
    }

    public function destroy($id){
        $productos = Productos::findOrFail($id);
        $productos->condicion='0';
        $productos->delete();
        return Redirect::to('productos');
    }

    

}
