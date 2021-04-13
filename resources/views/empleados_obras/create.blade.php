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
                        <i class="pe-7s-users icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>EMPLEADOS POR OBRA
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
                <form class="needs-validation" novalidate method="POST" action="{{route('empleados_obras.store')}}">
                    @csrf
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Empleado</label>
                                        <select class="form-control" name="id_empleado" id="id_empleado" required>
                                            <option value="">Seleccione empleado</option>
                                            @foreach($empleados as $empleados)
                                            <option value="{{$empleados->id_empleado}}">
                                                {{$empleados->nombre_empleado}} {{$empleados->apellido_empleado}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Obra</label>
                                        <select class="form-control" name="id_obra" id="id_obra" required>
                                            <option value="">Seleccione Obra</option>
                                            @foreach($obras as $obras)
                                            <option value="{{$obras->id_obra}}">
                                                {{$obras->descripcion_obra}}
                                            </option>
                                            @endforeach
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
                                        <a href="{{route('empleados_obras.index')}}">Volver a la lista</a>
                                    </div>
                                </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
