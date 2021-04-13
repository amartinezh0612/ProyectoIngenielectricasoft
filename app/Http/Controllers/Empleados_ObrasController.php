<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empleados_Obras;
use App\Empleados;
use App\Obras;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Empleados_ObrasFormrequest;
use DB;

class Empleados_ObrasController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {

        /* $empleados=Empleados::orderBy('id_empleado','DESC')->paginate();
        return view('empleados.list',compact('empleados')); */
        if($request){
            $query=trim($request->get('searchText'));
            $empleados_obras=DB::table('empleados_obras')
            ->join('empleados','empleados.id_empleado','empleados_obras.id_empleado')
            ->join('obras','obras.id_obra','empleados_obras.id_obra')
            ->select('empleados_obras.*','empleados.nombre_empleado','empleados.apellido_empleado','obras.descripcion_obra')
            ->orderBy('empleados_obras.id_empleado_obra','desc')
            ->paginate(10);
            return view('empleados_obras.list',["empleados_obras"=>$empleados_obras,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $empleados = Empleados::all();
        $obras = Obras::all();
         return view("empleados_obras.create",compact('empleados','obras'));
    }

    public function store(Empleados_ObrasFormrequest $request)
    {
        $empleados_obras= new Empleados_Obras;
        $empleados_obras->id_empleado=$request->get('id_empleado');
        $empleados_obras->id_obra=$request->get('id_obra');
        $empleados_obras->save();
        return Redirect::to('empleados_obras');
    }
 
    public function show($id)
    {
        return view ("empleados_obras.show",["empleados_obras"=>Empleados_Obras::findOrFail($id)]);
    }

    public function edit($id)
    {
        $empleados=DB::table('empleados')->get();
        $obras=DB::table('obras')->get();
        $empleados_obras=Empleados_Obras::find($id);
        
        return view('empleados_obras.edit',compact('empleados','obras','empleados_obras'));
    }

    public function update(Empleados_ObrasFormrequest $request,$id)
    {
        $empleados_obras=Empleados_Obras::findOrFail($id);
        $empleados_obras->id_empleado=$request->get('id_empleado');
        $empleados_obras->id_obra=$request->get('id_obra');
        $empleados_obras->update();
        return Redirect::to('empleados_obras');
    }

}
