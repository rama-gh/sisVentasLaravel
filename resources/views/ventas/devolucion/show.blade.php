@extends('layouts.app')
@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="proveedor">Cliente</label>
							<p>{{$devolucion->nombre}}</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="fecha_hora">Fecha de la devolución</label>
							<p>{{date("d-m-Y", strtotime($devolucion->fecha_devolucion))}}</p>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label>Número de Comprobante Devolución</label>
							<p>{{$devolucion->num_comprobante}}</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="num_comprobante">Número de Factura</label>
							<p>{{$devolucion->num_factura}}</p>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-body">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  table-responsive">
							 <table class="table table-striped table-bordered table-condensed table-hover">
								<thead style="background-color: #A9D0F5">
									<th>Artículos</th>
									<th>Cantidad</th>
									<th>Estado</th>
									<th>Descripción</th>
								</thead>
								<tbody>
									@foreach($detalles as $det)
										<tr>
											<td>{{$det->nombre}}</td>
											<td>{{$det->cantidad}}</td>
											<td>
												@if ($det->sube_resta == 'sumar')
												    Se sumo en el Stock
												@else
													No se sumo ni se resto
												@endif
											</td>
											<td>{{$det->descripcion}}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div>
					<a target="_blank" href="{{route('devolucion.pdf', $devolucion->iddevolucion)}}"><button class="btn btn-info btn-xs"> <i class="fa fa-print"></i> Descargar PDF</button></a>
				</div>
			</div>
		</div>
	</section>
	{!!Form::close()!!}




@endsection
