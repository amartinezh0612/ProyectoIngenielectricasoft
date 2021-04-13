<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Proveedores;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedoresFormrequest;
use App\Http\Requests\ProveedoresUpdateFormRequest;
use DB;

class ProveedoresController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        //

        $proveedores=Proveedores::orderBy('id_proveedor','DESC')->paginate();
        return view('proveedores.list',compact('proveedores'));
    }


    public function create()
    {
        return view("proveedores.create");
    }

    public function store(ProveedoresFormrequest $request)
     {
         $proveedores= new Proveedores;
         $proveedores->proveedor=$request->input('proveedor');
         $proveedores->telefono=$request->input('telefono');
         $proveedores->estado=$request->input('estado');
         $proveedores->save();
         return Redirect::to('proveedores');
     }

       public function show($id)
    {
        //
        return view ("proveedores.show",["proveedores"=>Proveedores::findOrFail($id)]);

    }

    public function edit($id)
    {
        //
        return view ("proveedores.edit",["proveedores"=>Proveedores::findOrFail($id)]);
    }


    public function update(ProveedoresUpdateFormRequest $request, $id)
    {
        $proveedores=Proveedores::findOrFail($id);
         $proveedores->proveedor=$request->get('proveedor');
         $proveedores->telefono=$request->get('telefono');
         $proveedores->estado=$request->get('estado');
         $proveedores->update();
         return Redirect::to('proveedores');
    }

    
    public function destroy($id)
    {
        //
        $proveedores = Proveedores::findOrFail($id);
        $proveedores->condicion='0';
        $proveedores->delete();
        return Redirect::to('proveedores');
    }
}
