@extends('layouts.app')

@section('content')
<div class="register-box">
  <div class="register-box-body">
    <p class="login-box-msg">Registro del Sistema</p>

    <form action="{{ route('register') }}" role="form" method="POST">
      {{ csrf_field() }}
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
        <input type="password" name="password" class="form-control" required placeholder="Contraseña">
      </div>
      <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
        <input type="password" name="password_confirmation" class="form-control" required placeholder="Repita su contraseña">
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
        </div>
        <div class="col-xs-6">
             <span><a href="{{route('login')}}" class="text-center">¿Ya tienes una cuenta?</a></span>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

@endsection
