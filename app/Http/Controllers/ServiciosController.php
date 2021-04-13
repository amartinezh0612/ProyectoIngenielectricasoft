<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servicios;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ServiciosFormrequest;
use App\Http\Requests\ServiciosUpdateFormRequest;
use DB;

class ServiciosController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {

    if($request){
            $query=trim($request->get('searchText'));
            $servicios=DB::table('servicios')
            ->where('servicio','LIKE','%'.$query.'%')
            ->where('costo_servicio','LIKE','%'.$query.'%')
            ->where('estado','LIKE','%'.$query.'%')
            ->orderBy('servicios.id_servicio','desc')
            ->paginate(10);
            return view('servicios.list',["servicios"=>$servicios,"searchText"=>$query]);
        }
    }

    public function create()
    {
         return view("servicios.create");
    }

    public function store(ServiciosFormrequest $request)
    {
        $servicios= new Servicios;
        $servicios->servicio=$request->get('servicio');
        $servicios->costo_servicio=$request->get('costo_servicio');
        $servicios->estado=$request->get('estado');
        $servicios->save();
        return Redirect::to('servicios');
    }

    public function show($id)
    {
        return view ("servicios.show",["servicios"=>Servicios::findOrFail($id)]);
    }

    public function edit($id)
    {
        
        return view ("servicios.edit",["servicios"=>Servicios::findOrFail($id)]);

    }

    public function update(ServiciosUpdateFormRequest $request,$id)
    {
        $servicios=Servicios::findOrFail($id);
        $servicios->servicio=$request->get('servicio');
        $servicios->costo_servicio=$request->get('costo_servicio');
        $servicios->estado=$request->get('estado');
        $servicios->update();
        return Redirect::to('servicios');
    }

    public function destroy($id){
        $servicios = Servicios::findOrFail($id);
        $servicios->condicion='0';
        $servicios->delete();
        return Redirect::to('servicios');
    }
}
