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
                        <i class="pe-7s-bell icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>PEDIDOS
                        <div class="page-title-subheading">Sistema de Administración de Ingenielectricas SAS
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="pedidos/create"> <button type="button" data-toggle="tooltip" title="Registrar"
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
                <table class="table table-hover table-sm table-bordered" id="tblpedidos">
                    <thead>
                        <thead>
                            <tr>
                                <th nowrap>Proveedor</th>
                                <th nowrap>Fecha Elaboración Pedido</th>
                                <th nowrap>Fecha Inicio Entrega</th>
                                <th nowrap>Fecha Final Entrega</th>
                                <th nowrap>Monto Total</th>
                                <th nowrap>Opciones</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($pedidos as $ped)
                        <tr>
                            <td nowrap>{{ $ped->proveedor}}</td>
                            <td nowrap>{{ $ped->fecha_elaboracion }}</td>
                            <td nowrap>{{ $ped->fecha_inicio_pedido }}</td>
                            <td nowrap>{{ $ped->fecha_final_pedido }}</td>
                            <td nowrap><i class="fas fa-dollar-sign"></i> {{ $ped->monto_total }}</td>
                            <td><a href="{{URL::action('PedidosController@edit',$ped->id_pedido)}}"><button
                                        class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="#" data-target="#modal-delete-{{$ped->id_pedido}}" data-toggle="modal"><button
                                        class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar"><i
                                            class="fas fa-trash fa-lg"></i></button>
                                </a>
                                <a href="{{url('pdfpedidos', $ped->id_pedido)}}" target="_blank">
                                    <button type="button" class="btn btn-info btn-sm">
                                        <i class="fa fa-file fa-lg"></i>
                                    </button> &nbsp;
                                </a>
                            </td>

                         

                        </tr>
                        @endforeach
                    </tbody>
                    <script>
                        $(document).ready(function () {
                            $('#tblpedidos').DataTable({
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
            {{$pedidos->links()}}
        </div>
    </div>
    <script src="https://kit.fontawesome.com/ddc157489c.js" crossorigin="anonymous"></script>
</body>

</html>
@stop
