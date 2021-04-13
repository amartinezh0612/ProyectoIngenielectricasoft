<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$usu->id_usuario}}" data-backdrop="false">
    {{Form::Open(array('action'=>array('UsuariosController@destroy',$usu->id_usuario),'method'=>'delete'))}}
    <br>
    <br>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Usuario</h4>
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

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-estado-{{$usu->id_usuario}}" data-backdrop="false">
    <form class="needs-validation" novalidate method="POST" action="{{route('usuarios.update', $usu->id_usuario)}}">
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
                    <input type="hidden" name="numero_documento" class="form-control" value="{{$usu->numero_documento}}" required>
                    <input type="hidden" name="nombre_usuario" class="form-control" value="{{$usu->nombre_usuario}}" required>
                    <input type="hidden" name="apellido_usuario" class="form-control" value="{{$usu->apellido_usuario}}" required>
                    <input type="hidden" name="telefono" class="form-control" value="{{$usu->telefono}}" required>
                    <input type="hidden" name="correo_electronico" class="form-control" value="{{$usu->correo_electronico}}" required>
                    <input type="hidden" name="contrasena" class="form-control" value="{{$usu->contrasena}}" required>
                    <input type="hidden" name="id_rol" class="form-control" value="{{$usu->id_rol}}" required>
                    @if($usu->estado=="Activo")
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
