<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-estado-{{$solic->id_solicitud_servicio}}" data-backdrop="false">
    <form class="needs-validation" novalidate method="POST" action="{{route('solicitud_servicios.update', $solic->id_solicitud_servicio)}}">
        {!! method_field('PUT')!!}
        @csrf
        <br>
        <br>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Estado</h4>
                </div>
                <div class="modal-body">
                <input type="hidden" name="id_usuario" value="{{$solic->id_usuario}}" required>
                <input type="hidden" name="id_empleado" value="{{$solic->id_empleado}}" required>
                <input type="hidden" name="servicios" value="{{$solic->id_servicio}}" required>
                <input type="hidden" name="costo_servicio" value="{{$solic->costo_servicio}}" required>
                <input type="hidden" name="fecha_solicitud" value="{{$solic->fecha_solicitud}}" required>
                <input type="hidden" name="fecha_inicio" value="{{$solic->fecha_inicio}}" required>
                <input type="hidden" name="fecha_terminacion" value="{{$solic->fecha_terminacion}}" required>
                <input type="hidden" name="contacto" value="{{$solic->contacto}}" required>
                <input type="hidden" name="direccion_servicio" value="{{$solic->direccion_servicio}}" required>
                <input type="hidden" name="telefono_servicio" value="{{$solic->telefono_servicio}}" required>
                <input type="hidden" name="fecha_pago" value="{{$solic->fecha_pago}}" required>
                <select type="text" class="form-control" name="estado">
                        <option>{{$solic->estado}}</option>
                        @if($solic->estado=="Pendiente")
                        <option>En Ejecución</option>
                        <option>Finalizado</option>
                        @elseif($solic->estado=="En Ejecución")
                        <option>Pendiente</option>
                        <option>Finalizado</option>
                        @else
                        <option>Pendiente</option>
                        <option>En Ejecición</option>
                        @endif
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-success">Confirmar</button>
                </div>
            </div>
        </div>
    </form>
</div>