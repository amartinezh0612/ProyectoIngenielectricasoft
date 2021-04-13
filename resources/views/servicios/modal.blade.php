<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$ser->id_servicio}}" data-backdrop="false">
    {{Form::Open(array('action'=>array('ServiciosController@destroy',$ser->id_servicio),'method'=>'delete'))}}
    <br>
    <br>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Servicio</h4>
            </div>
            <div class="modal-body">
                <p>Está seguro que desea eliminar el registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary"
                    data-dismiss="modal">Cerrar</button>
                <button type="submit"
                    class="mb-2 mr-2 border-0 btn-transition btn btn-outline-success">Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-estado-{{$ser->id_servicio}}" data-backdrop="false">
    <form class="needs-validation" novalidate method="POST" action="{{route('servicios.update', $ser->id_servicio)}}">
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
                    <input type="hidden" name="servicio" class="form-control" value="{{$ser->servicio}}" required>
                    <input type="hidden" name="costo_servicio" class="form-control" value="{{$ser->costo_servicio}}" required>
                    @if($ser->estado=="Activo")
                    <p>Seguro que desea cambiar el estado a "Inactivo"</p>
                    <input type="hidden" name="estado" value="Inactivo">
                    @else
                    <p>Seguro que desea cambiar el estado a "Activo"</p>
                    <input type="hidden" name="estado" value="Activo">
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-success">Confirmar</button>
                </div>
            </div>
        </div>
    </form>
</div>
