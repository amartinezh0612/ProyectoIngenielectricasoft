<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empleados;
use App\Cargos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmpleadosFormrequest;
use App\Http\Requests\EmpleadosUpdateFormRequest;
use DB;

class EmpleadosController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {

        if($request){
            $query=trim($request->get('searchText'));
            $empleados=DB::table('empleados')
            ->join('cargos','cargos.id_cargo','empleados.id_cargo')
            ->select('empleados.*','cargos.descripcion_cargo')
            ->where('numero_documento','LIKE','%'.$query.'%')
            ->where('nombre_empleado','LIKE','%'.$query.'%')
            ->where('apellido_empleado','LIKE','%'.$query.'%')
            ->where('telefono','LIKE','%'.$query.'%')
            ->where('direccion','LIKE','%'.$query.'%')
            /* ->where('estado','LIKE','%'.$query.'%') */
            ->orderBy('empleados.id_empleado','desc')
            ->paginate(10);
            return view('empleados.list',["empleados"=>$empleados,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $cargos = Cargos::all();
         return view("empleados.create",compact('cargos'));
    }

    public function store(EmpleadosFormrequest $request)
    {
        $empleados= new Empleados;
        $empleados->id_cargo=$request->get('id_cargo');
        $empleados->numero_documento=$request->get('numero_documento');
        $empleados->nombre_empleado=$request->get('nombre_empleado');
        $empleados->apellido_empleado=$request->get('apellido_empleado');
        $empleados->telefono=$request->get('telefono');
        $empleados->direccion=$request->get('direccion');
        $empleados->estado=$request->get('estado');
        $empleados->save();
        return Redirect::to('empleados');
    }
 
    public function show($id)
    {
        return view ("empleados.show",["empleados"=>Empleados::findOrFail($id)]);
    }

    public function edit($id)
    {
        $cargos=DB::table('cargos')->get();
        $empleados=Empleados::where('id_empleado',$id)->first();
        return view('empleados.edit',compact('empleados','cargos'));
    }

    public function update(EmpleadosUpdateFormRequest $request,$id)
    {
        $empleados=Empleados::findOrFail($id);
        $empleados->id_cargo=$request->get('id_cargo');
        $empleados->numero_documento=$request->get('numero_documento');
        $empleados->nombre_empleado=$request->get('nombre_empleado');
        $empleados->apellido_empleado=$request->get('apellido_empleado');
        $empleados->telefono=$request->get('telefono');
        $empleados->direccion=$request->get('direccion');
        $empleados->estado=$request->get('estado');
        $empleados->update();
        return Redirect::to('empleados');
    }



    public function destroy($id){
        $empleados = Empleados::findOrFail($id);
        $empleados->condicion='0';
        $empleados->delete();
        return Redirect::to('empleados');
    }

}
