<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$imp->id_implemento}}" data-backdrop="false">
    {{Form::Open(array('action'=>array('ImplementosController@destroy',$imp->id_implemento),'method'=>'delete'))}}
    <br>
    <br>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Implemento</h4>
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

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-estado-{{$imp->id_implemento}}" data-backdrop="false">
    <form class="needs-validation" novalidate method="POST" action="{{route('implementos.update', $imp->id_implemento)}}">
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
                    <input type="hidden" name="id_empleado" class="form-control" value="{{$imp->id_empleado}}" required>
                    <input type="hidden" name="fecha_entrega" class="form-control" value="{{$imp->fecha_entrega}}" required>
                    @if($imp->estado=="Entregado")
                    <p>Seguro que desea cambiar el estado a "No Entregado"</p>
                    <input type="hidden" name="estado" value="No Entregado">
                    @else
                    <p>Seguro que desea cambiar el estado a "Entregado"</p>
                    <input type="hidden" name="estado" value="Entregado">
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
