@extends('layouts.app')

@section('content')
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo"> 
                                <span class="l l1"></span> 
                                <span class="l l2"></span> 
                                <span class="l l3"></span>
                                <span class="l l4"></span> 
                                <span class="l l5"></span> 
                                </div> ModularAdmin </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-xs-center">Recuperar Contraseña</p>
                        <p class="text-muted text-xs-center">
                            <small>Ingrese su correo para recuperar su contraseña.</small>
                        </p>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form id="reset-form" role="form" action="{{ route('password.email') }}" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}"> 
                                <label for="email1">Correo</label> 
                                <input type="email" class="form-control underlined" name="email1" id="email1" placeholder="Ingresa tu correo" required autofocus> 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group"> 
                                <button type="submit" class="btn btn-block btn-primary">Recuperar Contraseña</button> 
                            </div>
                            <div class="form-group clearfix">
                                <a class="pull-left" href="{{ route('login') }}">Iniciar Seción!</a> 
                                <a class="pull-right" href="{{ route('register') }}">Registrarse!</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-xs-center">
                    <a href="index.html" class="btn btn-secondary rounded btn-sm"> <i class="fa fa-arrow-left"></i> Inicio </a>
                </div>
            </div>
        </div>

@endsection
