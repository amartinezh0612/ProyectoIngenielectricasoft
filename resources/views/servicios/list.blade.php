@extends ('layouts.admin')
@section('contenido')
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.js">
    </script>
    <div class="app-main__inner col">
        <div class="app-page-title">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-id icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>SERVICIOS
                        <div class="page-title-subheading">Sistema de Administración de Ingenielectricas SAS
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="servicios/create"> <button type="button" data-toggle="tooltip" title="Registrar"
                            data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
                            NUEVO <i class="fa fa-plus-circle"></i>
                        </button></a>
                </div>
            </div>
        </div>
    </div>
</head>

<body>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table class="table table-hover table-sm table-bordered" id="tblservicios">
                    <thead>
                        <tr>
                            <th nowrap>Servicio</th>
                            <th nowrap>Costo</th>
                            <th nowrap>Estado</th>
                            <th nowrap>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $ser)
                        <tr>
                            <td nowrap>{{ $ser->servicio }}</td>
                            <td nowrap><i class="fas fa-dollar-sign"></i> {{ $ser->costo_servicio }}</td>
                            <td nowrap>
                            @if($ser->estado=="Activo")
                            <button type="button" class="col-md-6 btn btn-success btn-sm" data-toggle="modal" data-target="#modal-estado-{{$ser->id_servicio}}">Activo</button>
                            @else
                            <button type="button" class="col-md-6 btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-estado-{{$ser->id_servicio}}">Inactivo</button>
                            @endif
                        </td>
                            <td><a href="{{URL::action('ServiciosController@edit',$ser->id_servicio)}}"><button
                                class="btn btn-primary btn-sm"  data-toggle="tooltip" title="Editar"><i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="#" data-target="#modal-delete-{{$ser->id_servicio}}" data-toggle="modal"><button
                                class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash fa-lg"></i></button>
                                </a></i></button>
                            </td>
                        </tr>
                        @include('servicios.modal')
                        @endforeach
                    </tbody>
                    <script>
                        $(document).ready(function () {
                            $('#tblservicios').DataTable({
                                "language": {
                                    "lengthMenu": "_MENU_ Registros por pagina",
                                    "zeroRecords": "Sin Resultados",
                                    "search": "Buscar:",
                                    "info": "Listado _PAGE_ de _PAGES_ Paginas",
                                    "infoEmpty": "Sin Resultados",
                                    "infoFiltered": "(Busqueda de un total _MAX_ registros)",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                }
                            });
                        });

                    </script>
                </table>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/ddc157489c.js" crossorigin="anonymous"></script>
</body>

</html>
@stop
