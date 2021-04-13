<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuarios;
use App\Roles;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuariosFormrequest;
use App\Http\Requests\UsuariosUpdateFormRequest;
use DB;

class UsuariosController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {
       /*  $usuarios=Usuarios::orderBy('id_usuario','DESC')->paginate();
        return view('usuarios.list',compact('usuarios')); */

       if($request){
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('usuarios')
            ->join('roles','roles.id_rol','=','usuarios.id_rol')
            ->select('usuarios.*','roles.descripcion_rol')
            ->where('numero_documento','LIKE','%'.$query.'%')
            ->where('nombre_usuario','LIKE','%'.$query.'%')
            ->where('apellido_usuario','LIKE','%'.$query.'%')
            ->where('correo_electronico','LIKE','%'.$query.'%')
            ->where('telefono','LIKE','%'.$query.'%')
            ->where('contrasena','LIKE','%'.$query.'%')
            ->where('estado','LIKE','%'.$query.'%')
            ->orderBy('usuarios.id_usuario','desc')
            ->paginate(10);
            return view('usuarios.list',["usuarios"=>$usuarios,"searchText"=>$query]);
        } 

        
    }

    public function create()
    {
        $roles = Roles::all();
         return view("usuarios.create",compact('roles'));
    }

    public function store(UsuariosFormrequest $request)
    {
        $usuarios= new Usuarios;
        $usuarios->id_rol=$request->get('id_rol');
        $usuarios->numero_documento=$request->get('numero_documento');
        $usuarios->nombre_usuario=$request->get('nombre_usuario');
        $usuarios->apellido_usuario=$request->get('apellido_usuario');
        $usuarios->correo_electronico=$request->get('correo_electronico');
        $usuarios->telefono=$request->get('telefono');
        $usuarios->contrasena=$request->get('contrasena');
        $usuarios->estado=$request->get('estado');
        $usuarios->save();
        return Redirect::to('usuarios');
    }

    public function show($id)
    {
        return view ("usuarios.show",["usuarios"=>Usuarios::findOrFail($id)]);
    }

    public function edit($id)
    {
        $roles=DB::table('roles')->get();
        $usuarios=Usuarios::where('id_usuario',$id)->first();
        return view('usuarios.edit',compact('usuarios','roles'));

    }

    public function update(UsuariosUpdateFormRequest $request,$id)
    {

        $usuarios= Usuarios::findOrFail($id);
        $usuarios->id_rol=$request->get('id_rol');
        $usuarios->numero_documento=$request->get('numero_documento');
        $usuarios->nombre_usuario=$request->get('nombre_usuario');
        $usuarios->apellido_usuario=$request->get('apellido_usuario');
        $usuarios->correo_electronico=$request->get('correo_electronico');
        $usuarios->telefono=$request->get('telefono');
        $usuarios->contrasena=$request->get('contrasena');
        $usuarios->estado=$request->get('estado');
        $usuarios->save();

        return Redirect::to('usuarios');

    }

    public function destroy($id){
        $usuarios = Usuarios::findOrFail($id);
        $usuarios->condicion='0';
        $usuarios->delete();
        return Redirect::to('usuarios');
    }
}
