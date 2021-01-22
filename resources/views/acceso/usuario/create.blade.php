@extends('layouts.app')
@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<h3>Nuevo Usuario</h3>
						@if (count($errors)>0)
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
								</ul>
							</div>
						@endif
						{!! Form::open(array('url' => 'acceso/usuario', 'method'=>'POST', 'autocomplete' => 'off')) !!}
						{{Form::token()}}
						<div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
							<input type="text" name="name" class="form-control" required placeholder="Nombre">
						</div>
						<div class="form-group has-feedback {{ $errors->has('apellido') ? ' has-error' : '' }}">
							<input type="text" name="apellido" class="form-control" required placeholder="Apellido">
						</div>
						<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
							<input type="email" name="email" class="form-control" required placeholder="Correo">
						</div>
						<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
							<input type="password" name="password" class="form-control" required placeholder="contraseña">
						</div>
						<div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
							<input type="password" name="password_confirmation" class="form-control" required placeholder="Repita su contraseña">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
						</div>
						{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
