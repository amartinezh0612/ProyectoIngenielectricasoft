@extends ('layouts.admin')
@section ('contenido')

<!DOCTYPE html>
<html>

<head>
    <title>Editar Proveedo</title>
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

    <div class="app-main__inner col">
        <div class="app-page-title">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-bell icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>MOVIMIENTOS
                        <div class="page-title-subheading">Sistema de Administración de Ingenielectricas SAS
                        </div>
                    </div>
                </div>>
            </div>
        </div>
    </div>
</head>

<body>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Ingenielectricasoft</h5>
                <div>
                    <!-- Obtengo la sesión actual del usuario -->
                    {{ $message=Session::get('message') }}

                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                </div>
                <form class="needs-validation" novalidate method="POST"
                    action="{{route('pedidos.update', $pedidos->id_pedido)}}">
                    {!! method_field('PUT')!!}
                    @csrf
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Proveedor</label>
                                        <select type="text" name="id_proveedor" class="form-control" id="validationCustom03"
                                            data-live-search="true">

                                            @foreach($proveedores as $prov)

                                            <option {{$pedidos->id_proveedor==$prov->id_proveedor?'selected':''}}
                                                value="{{$prov->id_proveedor}}">{{$prov->proveedor}}
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
                                        <label for="validationTooltip05">Fecha Elaboracion</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="single_cal3" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            id="validationTooltip05" name="fecha_elaboracion"
                                                            value="{{$pedidos->fecha_elaboracion}}" required>
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
                                        <label for="validationTooltip05">Fecha Inicio</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="single_cal3" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            id="validationTooltip05" name="fecha_inicio"
                                                            value="{{$pedidos->fecha_inicio}}" required>
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
                                        <label for="validationTooltip05">Fecha Final</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="single_cal3" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            id="validationTooltip05" name="fecha_final"
                                                            value="{{$pedidos->fecha_final}}" required>
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
                                    <label for="validationTooltip04">Monto Total</label>
                                    <input type="number" class="form-control" min="1" id="validationTooltip04"
                                        placeholder="Total" name="monto_total" value="{{$pedidos->monto_total}}"
                                        required>
                                    <div class="invalid-feedback">
                                        Campo Obligatorio
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" align="right">
                                <div class="form-group">
                                    <button type="submit" class="mb-2 mr-2 btn btn-success">Guardar</button>
                                    <a href="{{route('pedidos.index')}}">Volver a la lista</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

@stop
