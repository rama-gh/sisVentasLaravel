@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Configuración Del Sistema <a class="btn btn-primary btn-xs" href="{{URL::action('ConfigController@edit', $config->idconfig)}}"><i class="fa fa-edit"></i> Editar</a></h3>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <h4>Nombre de su Sistema: {{$config->nombre}}</h4>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <h4>Lema: {{$config->lema}}</h4>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <h4>Documento de la empresa: {{$config->dni}}</h4>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <h4>Teléfono: {{$config->telefono}}</h4>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <h4>Direccion: {{$config->direccion}}</h4>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <h4>Página: {{$config->campo2}}</h4>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                @if ($config->menu_mini == '1')
                  <h4>Menu del negocio: Minimizado</h4>
                @else
                  <h4>Menu del negocio: Maximizado</h4>
                @endif
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <h4>Imagen del Sistema</h4>
                <img src="{{asset('imagenes/config/'.$config->imagen)}}" height="100px" width="100px" class="img-thumbnail">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
