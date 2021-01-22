@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Configuración Del Sistema <a class="btn btn-primary btn-xs"
                                                         href="{{URL::action('ConfigController@edit', $config->idconfig)}}"><i
                                        class="fa fa-edit"></i> Editar</a></h3>
                    </div>
                    {!!Form::model($config,['route'=>['configuracion.update', $config->idconfig] , 'method'=>'PATCH', 'files'=>'true'] )!!}
                    {{Form::token()}}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Nombre del Negocio</label>
                                <input type="text" required value="{{$config->nombre}}" name="nombre"
                                       placeholder="Nombre del negocio" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Lema del Negocio</label>
                                <input type="text" value="{{$config->lema}}" name="lema" placeholder="Lema del negocio"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>DNI del Negocio</label>
                                <input type="text" value="{{$config->dni}}" name="dni" placeholder="DNI del negocio"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Teléfono del Negocio</label>
                                <input type="text" required value="{{$config->telefono}}" name="telefono"
                                       placeholder="Teléfono del negocio" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Correo del Negocio</label>
                                <input type="text" value="{{$config->correo}}" name="correo"
                                       placeholder="Correo del negocio" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Página del Negocio</label>
                                <input type="text" value="{{$config->campo2}}" name="pagina"
                                       placeholder="Página web del negocio" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Dirección del kiosco</label>
                                <input type="text"  value="{{$config->direccion}}" name="direccion"
                                       placeholder="Dirección del kiosco" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Menu de Opciones</label>
                                <select name="menu_mini" class="form-control">
                                    @if ($config->menu_mini == '1')
                                        <option selected value="1">Minimizado</option>
                                        <option value="2">Maximizado</option>
                                    @else
                                        <option value="1">Minimizado</option>
                                        <option selected value="2">Maximizado</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Logo del negocio</label>
                                <input type="file" name="imagen" class="form-control">
                                @if(($config->imagen)!="")
                                    <img src="{{asset('imagenes/config/'.$config->imagen)}}" height="100px"
                                         width="100px" class="img-thumbnail">
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="reset" class="btn btn-danger btn-xs" data-dismiss="modal"> <i class="fa fa-window-close"></i> Cancelar</button>
                            <button type="submit"  class="btn btn-success  btn-xs"> <i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                        {!!Form::close()!!}

                </div>
            </div>
        </div>
    </section>
@endsection
