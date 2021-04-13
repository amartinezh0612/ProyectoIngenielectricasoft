<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('contac');
});

Route::get('contac', 'ContactController@getContact');
Route::post('contac', 'ContactController@saveContact');
Route::resource('proveedores', 'ProveedoresController');
Route::resource('obras', 'ObrasController');
Route::resource('cargos', 'CargosController');
Route::resource('empleados', 'EmpleadosController');
Route::resource('usuarios', 'UsuariosController');
Route::resource('unidad_medida', 'Unidad_MedidaController');
Route::resource('implementos', 'ImplementosController');
Route::resource('servicios', 'ServiciosController');
Route::resource('roles', 'RolesController');
Route::resource('empleados_obras', 'Empleados_ObrasController');
Route::resource('productos', 'ProductosController');
Route::resource('solicitud_servicios', 'Solicitud_ServiciosController');
Route::resource('movimientos', 'MovimientosController');

Route::resource('pedidos', 'PedidosController');

Route::get('/pdfpedidos/{id_pedidos}', 'PedidosController@pdf');
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
