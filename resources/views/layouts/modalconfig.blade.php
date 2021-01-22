<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" id="tamañomodal">
  <div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header ">
      <h4 class="modal-title" id="myModalLabel">
        Bienvenido al Sistema {{Auth::user()->name}} {{ Auth::user()->apellido }}
      </h4>
      <p>A continuación, configuremos su sistema, por favor recuerde colocar correctamente sus dato, pero si surge algún dato erróneo; puede configurarlo correctamente en el apartado "Configuración". Si su problema no se soluciona, contacte con el Administrador del sistema.</p>
    </div>
    <div class="modal-body">
      {!! Form::open(array('url' => 'config/create', 'method'=>'POST', 'autocomplete' => 'off', 'files' => 'true')) !!}
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Nombre del Negocio</label>
              <input type="text" required name="nombre" placeholder="Nombre del negocio" title="Modelos posibles: A1, A3, A4 y A15" class="form-control">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Lema del Negocio</label>
              <input type="text" name="lema" placeholder="Lema del negocio" class="form-control">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>DNI del Negocio</label>
              <input type="number" name="dni" placeholder="DNI del negocio" class="form-control">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Teléfono del Negocio</label>
              <input type="number" required name="telefono" placeholder="Teléfono del negocio" class="form-control">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Correo del Negocio</label>
              <input type="text" name="correo" placeholder="Correo del negocio" class="form-control">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Página del Negocio</label>
              <input type="text" name="pagina" placeholder="Página web del negocio" class="form-control">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Dirección del Negocio</label>
              <input type="text" required name="direccion" placeholder="Dirección del Negocio" class="form-control">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Menú de Opciones</label>
              <select name="menu_mini" class="form-control">
                <option value="1">Minimizado</option>
                <option value="2">Maximizado</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Logo del negocio</label>
              <input type="file" name="imagen" onchange="control(this)" accept="image/*" class="form-control">
            </div>
          </div>
          <input type="hidden" name="idusuario" value="{{Auth::user()->id}}">
          <div class="modal-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <button class="btn btn-primary btn-xs" type="submit"><i class="fa fa-save"></i> Guardar Configuración</button>
              </div>
            </div>
          </div>
    {!!Form::close()!!}
  </div>
</div>
</div>
