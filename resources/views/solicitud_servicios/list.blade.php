@extends ('layouts.admin')
@section('contenido')
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/dt/dt-1.10.18/datatables.min.css"/>
    <div class="app-main__inner col">
        <div class="app-page-title">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-bell icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>SOLICITUD DE SERVICIOS
                        <div class="page-title-subheading">Sistema de Administración de Ingenielectricas SAS
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="solicitud_servicios/create"> <button type="button" data-toggle="tooltip" title="Registrar"
                            data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
                            NUEVO <i class="fa fa-plus-circle"></i>
                        </button></a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-body {
            overflow-x: auto
        }
    </style>
</head>

<div class="modal fade" aria-hidden="true" id="modal-vista" role="dialog" tabindex="-1" data-backdrop="false">
    <br>
    <br>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Vista completa solicitud servicios</h4>
            </div>
            <div class="modal-body">
                @foreach ($solicitud_servicios as $solic)
                <table class="table table-borderless table-sm table-bordered">
                    <thead class="text-center">
                        <tr>
                                <th nowrap >Usuario</th>                                
                                <th nowrap >Empleado</th>                               
                                <th nowrap >Servicio</th>                               
                                <th nowrap >Costo</th>                                                                                              
                                <th nowrap >Dirección</th>                              
                                <th nowrap >Teléfono</th>                                                              
                        </tr>
                    </thead>
                    <tbody class="text-center">
                            <td nowrap class="text-center">{{ $solic->nombre_usuario}} </td>
                            <td nowrap>{{ $solic->nombre_empleado}}</td>
                            <td nowrap>{{ $solic->servicio}}</td>
                            <td nowrap><i class="fas fa-dollar-sign"></i> {{ $solic->costo_servicio}}</td>
                            <td nowrap>{{ $solic->direccion_servicio }}</td>
                            <td nowrap>{{ $solic->telefono_servicio}}</td>                           
                    </tbody>               
                </table>

                <table class="table table-borderless table-sm table-bordered" >
                <thead>
                        <tr>
                                <th nowrap >Fecha Solicitud</th>                              
                                <th nowrap >Fecha Inicio</th>                                
                                <th nowrap >Fecha Terminación</th>
                                <th nowrap >Fecha Pago</th>
                                <th nowrap >Nombre de Contacto</th>
                                <th nowrap >Estado</th>
                                <th nowrap >opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <td nowrap>{{ $solic->fecha_pago }}</td>
                        <td nowrap>{{ $solic->fecha_solicitud }}</td>
                        <td nowrap>{{ $solic->fecha_inicio }}</td>
                        <td nowrap>{{ $solic->fecha_terminacion }}</td>
                        <td nowrap>{{ $solic->contacto }}</td>
                        <td nowrap>
                            @if($solic->estado=="Pendiente")
                            <button type="button" class="col-md-12 btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-estado-{{$solic->id_solicitud_servicio}}">Pendiente</button>
                            @elseif ($solic->estado=="En Ejecución")
                            <button type="button" class="col-md-12 btn btn-success btn-sm" data-toggle="modal" data-target="#modal-estado-{{$solic->id_solicitud_servicio}}">En Ejecución</button>
                            @else 
                            <button type="button" class="col-md-12 btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-estado-{{$solic->id_solicitud_servicio}}">Finalizado</button>
                            @endif
                            </td>
                        <td >
                            <a href="{{URL::action('Solicitud_ServiciosController@edit',$solic->id_solicitud_servicio)}}"><button
                                class="btn btn-primary btn-sm"  data-toggle="tooltip" title="Editar"><i class="fas fa-edit fa-lg"></i></button>
                                </a>
                        </td>
                    </tbody>
                </table>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<body>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table class="table table-hover table-sm table-bordered" id="tblsolicitud_servicios">
                    <thead>
                        <thead>
                            <tr>
                                <th nowrap >Usuario</th>
                                <th nowrap >Empleado</th>
                                <th nowrap >Servicio</th>
                                <th nowrap >Costo</th>
                                <th nowrap >Dirección</th>
                                <th nowrap >Teléfono</th>
                                <th nowrap >Estado</th>
                                <th nowrap >Opciones</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($solicitud_servicios as $solic)
                        <tr>
                            <td nowrap>{{ $solic->nombre_usuario}} </td>
                            <td nowrap>{{ $solic->nombre_empleado}}</td>
                            <td nowrap>{{ $solic->servicio}}</td>
                            <td nowrap><i class="fas fa-dollar-sign"></i> {{ $solic->costo_servicio}}</td>
                            <td nowrap>{{ $solic->direccion_servicio }}</td>
                            <td nowrap>{{ $solic->telefono_servicio}}</td>
                            <td nowrap>
                            @if($solic->estado=="Pendiente")
                            <button type="button" class="col-md-12 btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-estado-{{$solic->id_solicitud_servicio}}">Pendiente</button>
                            @elseif ($solic->estado=="En Ejecución")
                            <button type="button" class="col-md-12 btn btn-success btn-sm" data-toggle="modal" data-target="#modal-estado-{{$solic->id_solicitud_servicio}}">En Ejecución</button>
                            @else 
                            <button type="button" class="col-md-12 btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-estado-{{$solic->id_solicitud_servicio}}">Finalizado</button>
                            @endif
                        </td>
                            <td >
                            <a href="{{URL::action('Solicitud_ServiciosController@edit',$solic->id_solicitud_servicio)}}"><button
                                class="btn btn-primary btn-sm"  data-toggle="tooltip" title="Editar"><i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-vista"><i class="fas fa-eye"></i></button>
                            </td>
                           
                        </tr>
                        @include('solicitud_servicios.modal')
                        @endforeach
                    </tbody>
                    <script>
$(document).ready(function () {
    $('#tblsolicitud_servicios').DataTable({
        "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });
</script>
                </table>
            </div>
            
        </div>
    </div>
    <script src="https://kit.fontawesome.com/ddc157489c.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/w/dt/dt-1.10.18/datatables.min.js"></script>
</body>

</html>
@stop
