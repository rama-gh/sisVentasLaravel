@extends('layouts.app')
@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<div class="container-fluit">
						@include('flash::message')
				</div>
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<h3>Listado de Usuarios <a href="{{route('usuario.create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
						@include('acceso.usuario.search')
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-condensed table-hover">
								<thead>
									<th>Id</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Email</th>
									<th>Opciones</th>
								</thead>
								@foreach ($usuarios as $usu)
									<tbody>
										<tr>
											<td>{{ $usu->id}}</td>
											<td>{{ $usu->name}}</td>
											<td>{{ $usu->apellido}}</td>
											<td>{{ $usu->email}}</td>
											<td>
												<a href="{{URL::action('UsuarioController@edit', $usu->id)}}"><button class="btn btn-info">Editar</button></a>
												<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal" ><button class="btn btn-danger">Borrar</button></a>
											</td>
										</tr>
									</tbody>
									@include('acceso.usuario.modal')
								@endforeach
							</table>
						</div>
						{{$usuarios->render()}}
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
