@extends('layouts.admin')
@section('contenido')

<div class="row">
    <div class="col">
        <h3 class="text-center"></h3>
        @if (session('status'))
        @if(session('status') == '1')
        <div class="alert alert-success">
            Pedido Guardado!
        </div>
        @else
        <div class="alert alert-danger">
            {{session('status') }}
        </div>
        @endif
        @endif
    </div>
</div>
<!DOCTYPE html>-
<html>

<head>
    <title></title>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>
    <style>
        .btnatras {
            color: red;
        }

    </style>
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
            </div>
        </div>
    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .divOculto {
            display: none;
        }
    </style>
</head>

<body>
    <div class="col-lg-12">
        <div class="main-card mb-2 card">
            <div class="card-body">
                <h5 class="card-title">Ingenielectricasoft</h5>
                <div>
                    <!-- Obtengo la sesión actual del usuario -->
                    {{ $message=Session::get('message') }}

                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                </div>
                <form class="needs-validation" novalidate action="{{route('pedidos.store')}}" method="POST">
                    @csrf
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Proveedor</label>
                                        <select class="form-control" name="id_proveedor" id="id_proveedor" required>
                                            <option value="">Seleccione Proveedor</option>
                                            @foreach($proveedores as $proveedores)
                                            <option value="{{$proveedores->id_proveedor}}">
                                                {{$proveedores->proveedor}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip05">Fecha Elaboración Pedido</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="fecha_elaboracion" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            name="fecha_elaboracion" required>
                                                        <div class="invalid-feedback">
                                                            Campo Obligatorio
                                                        </div>
                                                        <span class="fa fa-calendar-o form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status3" class="sr-only"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip05">Fecha Inicio Entrega</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="fecha_inicio" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            name="fecha_inicio_pedido" required>
                                                        <div class="invalid-feedback">
                                                            Campo Obligatorio
                                                        </div>
                                                        <span class="fa fa-calendar-o form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status3" class="sr-only"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip05">Fecha Final Entrega </label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="fecha_final" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            name="fecha_final_pedido" required>
                                                        <div class="invalid-feedback">
                                                            Campo Obligatorio
                                                        </div>
                                                        <span class="fa fa-calendar-o form-control-feedback left"
                                                            aria-hidden="true"></span>
                                                        <span id="inputSuccess2Status3" class="sr-only"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                           <label for="validationTooltip04">Tipo Movimiento</label>
                                            <select name="tipo_movimiento" id="inputSelect" class="form-control" required>
                                                <option value="3">Seleccione tipo Movimiento</option>
                                                <option value="Entrada">Entrada</option>
                                                <option value="Devolucion">Devolución</option>
                                            </select>
                                        </div>
                                </div>

                                <div class="row divOculto" id="div1">
                                </div>

                                <div class="row divOculto" id="div3">
                                </div>

                            </div>
                        </div>
                        <h4 class="div">Detalle Pedidos</h4>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Producto</label>
                                            <select class="form-control" name="productos" id="productos"
                                                onchange="colocar_costo()">
                                                <option value="">Seleccione Producto</option>
                                                @foreach($productos as $productos)
                                                <option value="{{$productos->id_producto}}"
                                                    costo="{{$productos->costo}}">
                                                    {{$productos->descripcion_producto}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip04">Costo</label>
                                        <input type="number" class="form-control" placeholder="Costo" value="0"
                                            id="costo" name="costo" min="1" required readonly>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip04">Cantidad</label>
                                        <input type="number" class="form-control" id="cantidad" placeholder="Cantidad"
                                            value="" name="cantidad" id="cantidad" min="1">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationTooltip04">Monto Total</label>
                                        <input type="number" class="form-control" placeholder="Total General" value="0"
                                            id="total_general" name="monto_total" min="1" required readonly>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>

                                    <div class="form-group" align="right">
                                        <div class="form-group">
                                            <button id="btnagregar"
                                                onclick="agregar_producto(),document.getElementById('cantidad').value = '',document.getElementById('productos').value = '',document.getElementById('costo').value = ''"
                                                type="button" class="mb-2 mr-2 btn btn-primary">Agregar</button>
                                        </div>
                                    </div>
                                    <table class="table table-hover table-sm table-bordered">
                                        <thead>
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Costo</th>
                                                    <th>Subtotal</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                        <tbody id="tblproductos">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" align="right">
                            <div class="form-group">
                                <button type="submit" class="mb-2 mr-2 btn btn-success">Guardar</button>
                                <a href="{{route('pedidos.index')}}">Volver a la lista</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ddc157489c.js" crossorigin="anonymous"></script>


</body>

</html>
@stop

@section('script')
<script>
    $(function() {

$("#inputSelect").on('change', function() {

    var selectValue = $(this).val();
    switch (selectValue) {

        case "Entrada":
            $("#div1").show();
            $("#div2").hide();
            $("#div3").hide();
            break;

        case "Salida":
            $("#div1").hide();
            $("#div2").show();
            $("#div3").hide();
            break;

        case "3":
            $("#div1").hide();
            $("#div2").hide();
            $("#div3").show();
            break;
    }

}).change();

});

    function colocar_costo() {
        let costo = $("#productos option:selected").attr("costo");
        $("#costo").val(costo);
    };

    function agregar_producto() {
        let id_producto = $("#productos option:selected").val();
        let producto_text = $("#productos option:selected").text();
        let cantidad = $("#cantidad").val();
        let costo = $("#costo").val();
        let tipo_movimiento = $('#tipo_movimiento').val();

        if (cantidad > 0 && costo > 0) {
            $("#tblproductos").append(`
            <tr id="tr-${id_producto}">
                <td>
                <input type="hidden" name="id_producto[]" value="${id_producto}" />
                <input type="hidden" name="cantidades[]" value="${cantidad}" />
                <input type="hidden" name="costos[]" value="${costo}" />
                ${producto_text}
                </td>
                <td> ${cantidad}</td>
                <td><i class="fas fa-dollar-sign"></i>  ${costo}</td>
                <td><i class="fas fa-dollar-sign"></i>  ${parseInt(cantidad) * parseInt(costo)} </td>
                <td>
                <button type="button" class="btn btn-danger"  onclick="borrar_producto(${id_producto}, ${parseInt(cantidad) * parseInt(costo)})">Borrar</button>
                </td>
            </tr>`);
            let total_general = $("#total_general").val();
            $("#total_general").val(parseInt(total_general) + parseInt(cantidad) * parseInt(costo));
        } else {
            alert("Se debe ingresar una cantidad o precio valido");
        }
    }

    function borrar_producto(id, subtotal) {
        $("#tr-" + id).remove();
        let total_general = $("#total_general").val() || 0;
        $("#total_general").val(parseInt(total_general) - subtotal);
    }

</script>


@endsection
