<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$ped->id_pedido}}" data-backdrop="false">
    {{Form::Open(array('action'=>array('PedidosController@destroy',$ped->id_pedido),'method'=>'delete'))}}
    <br>
    <br>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Pedido</h4>
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
