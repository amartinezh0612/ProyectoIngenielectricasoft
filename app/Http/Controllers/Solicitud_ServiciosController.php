<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudServicios;
use App\Usuarios;
use App\Empleados;
use App\Servicios;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Solicitud_ServiciosFormrequest;
use App\Http\Requests\Solicitud_ServicioUpdateFormrequest;
use DB;

class Solicitud_ServiciosController extends Controller
{
    //
    //definicion de funciones
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $solicitud_servicios = DB::table('solicitudservicios')
            ->join('usuarios', 'usuarios.id_usuario', 'solicitudservicios.id_usuario')
            ->join('empleados', 'empleados.id_empleado', 'solicitudservicios.id_empleado')
            ->join('servicios', 'servicios.id_servicio', 'solicitudservicios.id_servicio')
            ->select('solicitudservicios.*', 'usuarios.nombre_usuario', 'empleados.nombre_empleado', 'servicios.servicio')

            ->paginate(10);

            return view('solicitud_servicios.list', ['solicitud_servicios' => $solicitud_servicios, 'searchText' => $query]);
        }
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        $empleados = Empleados::all();
        $servicios = Servicios::all();

        return view('solicitud_servicios.create', compact('usuarios', 'empleados', 'servicios'));
    }

    public function store(Solicitud_ServiciosFormrequest $request)
    {
        $solicitud_servicios = new SolicitudServicios();
        $solicitud_servicios->id_usuario = $request->get('id_usuario');
        $solicitud_servicios->id_empleado = $request->get('id_empleado');
        $solicitud_servicios->id_servicio = $request->get('servicios');
        $solicitud_servicios->costo_servicio = $request->get('costo_servicio');
        $solicitud_servicios->fecha_solicitud = $request->get('fecha_solicitud');
        $solicitud_servicios->fecha_inicio = $request->get('fecha_inicio');
        $solicitud_servicios->fecha_terminacion = $request->get('fecha_terminacion');
        $solicitud_servicios->contacto = $request->get('contacto');
        $solicitud_servicios->direccion_servicio = $request->get('direccion_servicio');
        $solicitud_servicios->telefono_servicio = $request->get('telefono_servicio');
        $solicitud_servicios->fecha_pago = $request->get('fecha_pago');
        $solicitud_servicios->estado = $request->get('estado');
        $solicitud_servicios->save();

        return Redirect::to('solicitud_servicios');
    }

    public function show($id)
    {
        return view('solicitud_servicios.show', ['solicitud_servicios' => SolicitudServicios::findOrFail($id)]);
    }

    public function edit($id)
    {
        $usuarios = DB::table('usuarios')->get();
        $servicios = DB::table('servicios')->get();
        $empleados = DB::table('empleados')->get();
        $solicitud_servicios = SolicitudServicios::where('id_solicitud_servicio', $id)->first();

        return view('solicitud_servicios.edit', compact('usuarios', 'servicios', 'empleados', 'solicitud_servicios'));
    }

    public function update(Solicitud_ServicioUpdateFormrequest $request, $id)
    {
        $solicitud_servicios = SolicitudServicios::findOrFail($id);
        $solicitud_servicios->id_usuario = $request->get('id_usuario');
        $solicitud_servicios->id_empleado = $request->get('id_empleado');
        $solicitud_servicios->id_servicio = $request->get('servicios');
        $solicitud_servicios->costo_servicio = $request->get('costo_servicio');
        $solicitud_servicios->fecha_solicitud = $request->get('fecha_solicitud');
        $solicitud_servicios->fecha_inicio = $request->get('fecha_inicio');
        $solicitud_servicios->fecha_terminacion = $request->get('fecha_terminacion');
        $solicitud_servicios->contacto = $request->get('contacto');
        $solicitud_servicios->direccion_servicio = $request->get('direccion_servicio');
        $solicitud_servicios->telefono_servicio = $request->get('telefono_servicio');
        $solicitud_servicios->fecha_pago = $request->get('fecha_pago');
        $solicitud_servicios->estado = $request->get('estado');
        $solicitud_servicios->update();

        return Redirect::to('solicitud_servicios');
    }

    public function destroy($id)
    {
        $solicitud_servicios = SolicitudServicios::findOrFail($id);
        $solicitud_servicios->condicion = '0';
        $solicitud_servicios->delete();

        return Redirect::to('solicitud_servicios');
    }
}
