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
                        <i class="pe-7s-portfolio icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>PRODUCTOS
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
                <form class="needs-validation" novalidate method="POST"
                    action="{{route('productos.update', $productos->id_producto)}}">
                    {!! method_field('PUT')!!}
                    @csrf
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Producto</label>
                                        <input type="text" class="form-control" id="validationTooltip04"
                                            placeholder="Ingrese Producto" name="descripcion_producto"
                                            value="{{$productos->descripcion_producto}}" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                        <label for="validationTooltip04">Precio</label>
                                        <input type="number" class="form-control" id="validationTooltip04"
                                            placeholder="Precio" name="costo" min="1" value="{{$productos->costo}}" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Unidad de Medida</label>
                                        <select type="text" name="id_unidad_medida" class="form-control"
                                            id="validationCustom03" data-live-search="true">

                                            @foreach($unidad_medida as $uni)

                                            <option
                                                {{$productos->id_unidad_medida==$uni->id_unidad_medida?'selected':''}}
                                                value="{{$uni->id_unidad_medida}}">{{$uni->descripcion_unidad_medida}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Stock</label>
                                        <input type="number" class="form-control" id="validationTooltip04"
                                            placeholder="Stock" name="stock"
                                            value="{{$productos->stock}}" required>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                    <!-- Obtengo la sesión actual del usuario -->
                    {{ $message=Session::get('message') }}

                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                </div>
                        <div class="form-group" align="right">
                            <div class="form-group">
                                <button type="submit" class="mb-2 mr-2 btn btn-success">Guardar</button>
                                <a href="{{route('productos.index')}}">Volver a la lista</a>
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
