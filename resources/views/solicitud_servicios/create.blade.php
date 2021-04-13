@extends('layouts.admin')
@section('contenido')
<!DOCTYPE html>
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
                        <i class="pe-7s-portfolio icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>SOLICITUD DE SERVICIOS
                        <div class="page-title-subheading">Sistema de Administración de Ingenielectricas SAS
                        </div>
                    </div>
                </div>
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
                <form class="needs-validation" novalidate method="POST" action="{{route('solicitud_servicios.store')}}">
                    @csrf
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Usuario</label>
                                        <select class="form-control" name="id_usuario" required>
                                            <option value="">Seleccione Usuario</option>
                                            @foreach($usuarios as $usu)
                                            <option value="{{$usu->id_usuario}}">
                                                {{$usu->nombre_usuario}} {{$usu->apellido_usuario}}
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
                                        <label for="validationTooltip04">Empleado</label>
                                        <select class="form-control" name="id_empleado" required>
                                            <option value="">Seleccione Empleado</option>
                                            @foreach($empleados as $emp)
                                            <option value="{{$emp->id_empleado}}">
                                                {{$emp->nombre_empleado}} {{$emp->apellido_empleado}}
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
                                        <label for="validationTooltip04">Servicio</label>
                                        <select class="form-control" name="servicios" id="servicios" required
                                            onchange="colocar_costo()">
                                            <option value="">Seleccione Servicio</option>
                                            @foreach($servicios as $servicios)
                                            <option value="{{$servicios->id_servicio}}"
                                                costo_servicio="{{$servicios->costo_servicio}}">
                                                {{$servicios->servicio}}
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
                                        <label for="validationTooltip04">Costo</label>
                                        <input type="number" name="costo_servicio" min="1" id="costo_servicio"
                                            class="form-control" value="0" required readonly>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip05">Fecha Solicitud</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="single_cal3" aria-describedby="inputSuccess2Status3"
                                                            name="fecha_solicitud" required>
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
                                                            id="single_cal3" aria-describedby="inputSuccess2Status3"
                                                            name="fecha_inicio">
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
                                        <label for="validationTooltip05">Fecha Terminación</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="single_cal3" aria-describedby="inputSuccess2Status3"
                                                            name="fecha_terminacion">
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
                                        <label for="validationTooltip04">Nombre Contacto</label>
                                        <input type="text" name="contacto" class="form-control" id="validationTooltip04"
                                            placeholder="Ingrese Contacto" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Dirección</label>
                                        <input type="text" name="direccion_servicio" class="form-control"
                                            id="validationTooltip04" placeholder="Ingrese Dirección" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Teléfono</label>
                                        <input type="number" name="telefono_servicio" class="form-control"
                                            id="validationTooltip04" placeholder="Ingrese Teléfono" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip05">Fecha Pago</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="single_cal3" aria-describedby="inputSuccess2Status3"
                                                            id="validationTooltip05" name="fecha_pago">
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
                                        <label for="validationTooltip04">Estado</label>
                                        <select class="form-control" name="estado" id="estado" required>
                                            <option value="">Seleccione el Estado</option>
                                            <option>Pendiente</option>
                                            <option>En Ejecución</option>
                                            <option>Finalizado</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" align="right">
                            <div class="form-group">
                                <button type="submit" class="mb-2 mr-2 btn btn-success">Guardar</button>
                                <a href="{{route('solicitud_servicios.index')}}">Volver a la lista</a>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</body>


</html>
@stop

@section('script')
<script>
    function colocar_costo() {
            let costo_servicio = $("#servicios option:selected").attr("costo_servicio");
            $("#costo_servicio").val(costo_servicio);
    };

</script>
@endsection
