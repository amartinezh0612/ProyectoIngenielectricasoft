<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Obras;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ObrasFormrequest;
use App\Http\Requests\ObrasUpdateFormrequest;
use DB;

class ObrasController extends Controller
{
     //definicion de funciones
     public function __construct()
     {
 
     }
 
     public function index(Request $request)
     {
        $obras=Obras::orderBy('id_obra','DESC')->paginate();
        return view('obras.list',compact('obras'));
     }
 
     public function create()
     {
          return view("obras.create");
     }
 
     public function store(ObrasFormrequest $request)
     {
         $obras= new Obras();
         $obras->descripcion_obra=$request->input('descripcion_obra');
         $obras->estado=$request->input('estado');
         $obras->save();
         return Redirect::to('obras');
     }
 
     public function show($id)
     {
         return view ("obras.show",["obras"=>Obras::findOrFail($id)]);
     }
 
     public function edit($id)
     {
         return view ("obras.edit",["obras"=>Obras::findOrFail($id)]);
 
     }
 
     public function update(ObrasUpdateFormrequest $request,$id)
     {
         $obras=Obras::findOrFail($id);
         $obras->descripcion_obra=$request->get('descripcion_obra');
         $obras->estado=$request->get('estado');
         $obras->update();
         return Redirect::to('obras');
     }
 
     public function destroy($id){
         $obras = Obras::findOrFail($id);
         $obras->condicion='0';
         $obras->delete();
         return Redirect::to('obras');
     }
}
