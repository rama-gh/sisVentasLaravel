<style media="screen">
#jquery-script-menu {
position: fixed;
height: 90px;
width: 100%;
top: 0;
left: 0;
border-top: 5px solid #316594;
background: #fff;
-moz-box-shadow: 0 2px 3px 0px rgba(0, 0, 0, 0.16);
-webkit-box-shadow: 0 2px 3px 0px rgba(0, 0, 0, 0.16);
box-shadow: 0 2px 3px 0px rgba(0, 0, 0, 0.16);
z-index: 999999;
padding: 10px 0;
-webkit-box-sizing:content-box;
-moz-box-sizing:content-box;
box-sizing:content-box;
}

.jquery-script-center {
width: 960px;
margin: 0 auto;
}
.jquery-script-center ul {
width: 212px;
float:left;
line-height:45px;
margin:0;
padding:0;
list-style:none;
}
.jquery-script-center a {
  text-decoration:none;
}
.jquery-script-ads {
width: 728px;
height:90px;
float:right;
}
.jquery-script-clear {
clear:both;
height:0;
}


.sample-window {
width: 350px;
padding: 5px;
border: 2px solid #186db4;
background-color: #fff;
display: none;
}
.plainmodal-close {
cursor: pointer;
}
.sample-window .plainmodal-close {
display: inline-block;
padding: 1px 3px;
color: #fff;
background-color: #224388;
}
.sample-window .plainmodal-close:hover {
background-color: #1f99e2;
}
.sample-button {
width: 240px;
margin: 5px;
padding: 3px 0;
border-radius: 3px;
color: #fff;
background-color: #224388;
font-weight: bold;
text-align: center;
cursor: pointer;
}
.sample-button:hover {
background-color: #1f99e2;
}
#modal-{{$ven->idventa}} {
width: 450px;
padding: 20px 40px;
color: #fff;
background-color: #00aa6a;
border-radius: 10px;
display: none;
font-family: 'Georgia', serif;
}
#modal-{{$ven->idventa}}:after { /* clearfix */
content: "";
clear: both;
display: block;
}
#modal-{{$ven->idventa}} p {
font-size: 18px;
}
#modal-{{$ven->idventa}} .sample-head {
margin: 0 0 15px;
font-size: 36px;
font-weight: bold;
}
#modal-{{$ven->idventa}} img {
float: left;
margin-right: 10px;
box-shadow: none;
}
#modal-{{$ven->idventa}} .plainmodal-close {
position: absolute;
width: 45px;
height: 45px;
right: -15px;
top: -15px;
background: url('{{asset('imagenes/close.png')}}') no-repeat;
}
#modal-{{$ven->idventa}} .plainmodal-close:hover {
background-position: -45px 0;
}
</style>
  <div id="modal-{{$ven->idventa}}">
  <div class="plainmodal-close"></div>
    <p class="sample-head">{{$ven->nombre}}</p>
    <div class="col-md-12">
        -  Nombre: {{$ven->nombre}}
    </div>
    <div class="col-md-12">
        @if ($ven->direccion == null)
        -  Falta datos por rellenar
        @else
        -  Dirección: {{$ven->direccion}}
        @endif
    </div>
    <div class="col-md-12">
        @if ($ven->telefono == null)
        -  Falta datos por rellenar
        @else
        -  Telefono: {{$ven->telefono}}
        @endif
    </div>
    <div class="col-md-12">
        -  Tipo de cliente: {{$ven->tipo_persona}}
    </div>
    <div class="col-md-12">
          @if ($ven->email == null)
        -  Falta datos por rellenar
          @else
        -  Correo: {{$ven->email}}
          @endif
    </div>
    <div class="col-md-12">
      @if ($ven->num_documento == null)
      -  Falta datos por rellenar
      @else
      -  {{$ven->tipo_documento}}:   {{$ven->num_documento}}
      @endif
    </div>
    @section('js')
      <script>
        @foreach ($ventas as $ven)
        $('#toggle-button-{{$ven->idventa}}').click(function() {
          $('#modal-{{$ven->idventa}}').plainModal('open');
        });
        @endforeach
      </script>
    @endsection
