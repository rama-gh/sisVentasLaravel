<div class="modal modal-danger" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$ing->idingreso}}">
	{!!Form::model($ing,['route'=>['ingreso.destroy', $ing->idingreso] , 'method'=>'delete'] )!!}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden='true'>x</span>
				</button>
				<h4 class="modal-title" > <i data-toggle="tooltip" title="Borrar Ingreso" class="fa fa-trash"></i> Cancelar Ingreso</h4>
			</div>
			<div style="overflow-y: auto !important;background-color: #ffffff !important;color: black !important;"  class="modal-body">
				<p style="text-align: center ">Confirme si desea Cancelar el Ingreso</p>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-outline pull-left btn-xs" data-dismiss="modal"> <i class="fa fa-window-close"></i> Cancelar</button>
				<button type="submit" class="btn btn-outline btn-xs"> <i class="fa fa-save"></i> Aceptar</button>
			</div>
		</div>
	</div>	
	{{Form::Close()}}
	
</div>