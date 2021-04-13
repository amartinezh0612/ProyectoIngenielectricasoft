<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Unidad_Medida;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Unidad_MedidaFormrequest;
use DB;

class Unidad_MedidaController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $unidad_medida=DB::table('unidad_medida')->where('descripcion_unidad_medida','LIKE','%'.$query.'%')
            ->orderBy('id_unidad_medida','desc')->paginate(5);
            return view('unidad_medida.list',["unidad_medida"=>$unidad_medida,"searchText"=>$query]);
        }
    }

    public function create()
    {
         return view("unidad_medida.create");
    }

    public function store(Unidad_MedidaFormrequest $request)
    {
        $unidad_medida= new Unidad_Medida;
        $unidad_medida->descripcion_unidad_medida=$request->get('descripcion_unidad_medida');
        $unidad_medida->save();
        return Redirect::to('unidad_medida');
    }

    public function show($id)
    {
        return view ("unidad_medida.show",["unidad_medida"=>Unidad_Medida::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view ("unidad_medida.edit",["unidad_medida"=>Unidad_Medida::findOrFail($id)]);

    }

    public function update(Unidad_MedidaFormrequest $request,$id)
    {
        $unidad_medida=Unidad_Medida::findOrFail($id);
        $unidad_medida->descripcion_unidad_medida=$request->get('descripcion_unidad_medida');
        $unidad_medida->update();
        return Redirect::to('unidad_medida');
    }

    public function destroy($id){
        $unidad_medida = Unidad_Medida::findOrFail($id);
        $unidad_medida->condicion='0';
        $unidad_medida->delete();
        return Redirect::to('unidad_medida');
    }

}
