@extends('layouts.app')
@section('content')
    <div class="login-box">
         <div class="login-box-msg">
            <h3>Sistema</h3>
            <div class="login-box-body">
                <p class="login-box-msg">Ingresa tus datos para entrar al Sistema</p>
                        <form id="login-form" action="{{ route('login') }}" method="POST" role="form" novalidate="">
                        {{ csrf_field() }}

                            <div class="has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Correo</label>
                                <input type="email" for="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo " required value="{{ old('email') }}"  >
                                @if ($errors->has('email'))
                                    <span class="has-error">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="has-feedback">
                                <label class="control-label" for="inputError1" for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Tu Contraseña" required>
                                @if ($errors->has('password'))
                                    <span class="has-error">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="has-feedback">
                                  <label>
                                    <input  name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                     Recordarme  </label>
                            </div>
                            <div class="has-feedback">
                                <button type="submit" class="btn btn-block btn-primary">Entrar</button>
                            </div>
                            <div class="has-feedback">
                                <p class="text-muted text-xs-center">¿No tienes una cuenta?<a href="{{ route('register') }}"> Registrate!</a></p>
                            </div>
                        </form>
            </div>
        </div>
    </div>
@endsection
