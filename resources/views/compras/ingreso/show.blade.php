@extends('layouts.app')
@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="proveedor">Proveedor</label>
							<p>{{$ingreso->proveedor->nombre}}</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label>Tipo Comprobante</label>
							<p>{{$ingreso->tipo_comprobante}}: {{$ingreso->num_comprobante}}</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="num_comprobante">Fecha</label>
							<p>{{date("d-m-Y", strtotime($ingreso->fecha_hora))}}</p>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-body">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
							<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
								<thead style="background-color: #A9D0F5">
									<th>Fecha</th>
									<th>Artículos</th>
									<th>Cantidad</th>
									<th>Precio Compra</th>
									<th>Precio Venta</th>
									<th>Subtotal</th>
								</thead>
								<tfoot>
									<th>Total</th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th class="text-derecha"><h4 id="total">{{number_format($ingreso->detalles->sum('precio_compra')* $ingreso->detalles->sum('cantidad'), 2, '.', '')}}</h4></th>
								</tfoot>
								<tbody>
									@foreach($ingreso->detalles as $det)
										<tr>
											<td>{{date("d-m-Y", strtotime($det->created_at))}}</td>
											<td>{{$det->articulo->nombre}}</td>

											<td class="text-derecha">{{$det->cantidad}}</td>
											<td class="text-derecha">{{$det->precio_compra}}</td>
											<td class="text-derecha">{{$det->precio_venta}}</td>
											<td class="text-derecha">{{number_format($det->cantidad*$det->precio_compra, 2, '.', '')}}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div>
						<a href="{{URL::action('PDFController@ingreso', $ingreso->idingreso)}}"><button class="btn btn-info btn-xs "> <i class="fa fa-print"></i> Descargar PDF</button></a>
				</div>
			</div>
		</div>
	</section>
	{!!Form::close()!!}
@endsection
