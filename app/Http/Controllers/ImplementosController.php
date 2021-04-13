<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Implementos;
use App\Empleados;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ImplementosFormrequest;
use DB;

class ImplementosController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {
         if($request){
            $query=trim($request->get('searchText'));
            $implementos=DB::table('implementos')
            ->join('empleados','empleados.id_empleado','implementos.id_empleado')
            ->select('implementos.*','empleados.nombre_empleado','empleados.apellido_empleado')
         /*    ->where('estado','LIKE','%'.$query.'%') */
            ->where('fecha_entrega','LIKE','%'.$query.'%')
            ->orderBy('implementos.id_implemento','desc')
            ->paginate(10);
            return view('implementos.list',["implementos"=>$implementos,"searchText"=>$query]);
        }

    }

    public function create()
    {
        $empleados = Empleados::all();
         return view("implementos.create",compact('empleados'));
    }
   //para hacer registros en la tabla
    public function store(ImplementosFormrequest $request)
    {
        $implementos= new Implementos;
        $implementos->estado=$request->get('estado');
        $implementos->id_empleado=$request->get('id_empleado');
        $implementos->fecha_entrega=$request->get('fecha_entrega');
        $implementos->save();
        return Redirect::to('implementos');
    }

    public function show($id)
    {
        return view ("implementos.show",["implementos"=>Implementos::findOrFail($id)]);
    }

    public function edit($id)
    {
        $empleados=DB::table('empleados')->get();
        $implementos=Implementos::where('id_implemento',$id)->first();
        return view('implementos.edit',compact('implementos','empleados'));
    }

    public function update(ImplementosFormrequest $request,$id)
    {
        
        $implementos=Implementos::findOrFail($id);
        $implementos->id_empleado=$request->get('id_empleado');
        $implementos->estado=$request->get('estado');
        $implementos->fecha_entrega=$request->get('fecha_entrega');
        $implementos->update();
        return Redirect::to('implementos');
    }

    public function destroy($id){
        $implementos = Implementos::findOrFail($id);
        $implementos->condicion='0';
        $implementos->delete();
        return Redirect::to('implementos');
    }

}
