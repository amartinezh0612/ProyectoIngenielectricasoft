@extends ('layouts.admin')
@section ('contenido')

<!DOCTYPE html>
<html>

<head>
    <title>Editar Solicitud de Servicio</title>
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
                        <i class="pe-7s-users icon-gradient bg-arielle-smile"> </i>
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
                <form class="needs-validation" novalidate method="POST"
                    action="{{route('solicitud_servicios.update', $solicitud_servicios->id_solicitud_servicio)}}">
                    {!! method_field('PUT')!!}
                    @csrf
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Usuario</label>
                                        <select type="text" name="id_usuario" class="form-control"
                                            id="validationCustom03" data-live-search="true">
                                            @foreach($usuarios as $usu)
                                            <option {{$solicitud_servicios->id_usuario==$usu->id_usuario?'selected':''}}
                                                value="{{$usu->id_usuario}}">{{$usu->nombre_usuario}}
                                                {{$usu->apellido_usuario}}
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
                                        <select type="text" name="id_empleado" class="form-control"
                                            id="validationCustom03" data-live-search="true">

                                            @foreach($empleados as $empo)

                                            <option
                                                {{$solicitud_servicios->id_empleado==$empo->id_empleado?'selected':''}}
                                                value="{{$empo->id_empleado}}">{{$empo->nombre_empleado}}
                                                {{$empo->apellido_empleado}}
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
                                        <select class="form-control" name="servicios" id="servicios"
                                            onchange="colocar_costo()">
                                            @foreach($servicios as $servicios)
                                            <option
                                                {{$solicitud_servicios->id_servicio==$servicios->id_servicio?'selected':''}}
                                                value="{{$servicios->id_servicio}}"
                                                costo_servicio="{{$servicios->costo_servicio}}">
                                                {{$servicios->servicio}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationTooltip04">Costo</label>
                                    <input type="number" class="form-control" min="1" placeholder="Costo"
                                        name="costo_servicio" id="costo_servicio"
                                        value="{{$solicitud_servicios->costo_servicio}}" required>
                                    <div class="invalid-feedback">
                                        Campo Obligatorio
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
                                                            id="single_cal3" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            id="validationTooltip05" name="fecha_solicitud"
                                                            value="{{$solicitud_servicios->fecha_solicitud}}" required>
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
                                                            value="{{$solicitud_servicios->fecha_inicio}}">
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
                                        <label for="validationTooltip05">Fecha Terminación</label>
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="">
                                                        <input type="date" class="form-control has-feedback-left"
                                                            id="single_cal3" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            id="validationTooltip05" name="fecha_terminacion"
                                                            value="{{$solicitud_servicios->fecha_terminacion}}"
                                                            >
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
                                        <label for="validationTooltip04">Contacto</label>
                                        <input type="text" class="form-control" id="validationTooltip04"
                                            placeholder="Ingrese contacto" name="contacto"
                                            value="{{$solicitud_servicios->contacto}}" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Dirección</label>
                                        <input type="text" class="form-control" id="validationTooltip04"
                                            placeholder="Ingrese Direccion" name="direccion_servicio"
                                            value="{{$solicitud_servicios->direccion_servicio}}" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Teléfono</label>
                                        <input type="number" class="form-control" id="validationTooltip04"
                                            placeholder="Ingrese Telefono" name="telefono_servicio"
                                            value="{{$solicitud_servicios->telefono_servicio}}" required>
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
                                                            id="single_cal3" placeholder="Fecha"
                                                            aria-describedby="inputSuccess2Status3"
                                                            id="validationTooltip05" name="fecha_pago"
                                                            value="{{$solicitud_servicios->fecha_pago}}" required>
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
                                        <select type="text" class="form-control" name="estado">
                                            <option>{{$solicitud_servicios->estado}}</option>
                                            @if($solicitud_servicios->estado=="Pendiente")
                                            <option>En Ejecución</option>
                                            <option>Finalizado</option>
                                            @elseif($solicitud_servicios->estado=="En Ejecución")
                                            <option>Pendiente</option>
                                            <option>Finalizado</option>
                                            @else
                                            <option>Pendiente</option>
                                            <option>En Ejecición</option>
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
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

@stop

@section('script')
<script>
    function colocar_costo() {
        let costo_servicio = $("#servicios option:selected").attr("costo_servicio");
        $("#costo_servicio").val(costo_servicio);
    };

</script>
@endsection
