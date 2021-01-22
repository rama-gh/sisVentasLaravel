@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{URL::to('/')}}/admin/css/jquery.dataTables.min.css">
    <style>
        table.dataTable tfoot th, table.dataTable tfoot td {
            padding: 0px 0px 0px 0px;
            border-top: 1px solid #111;
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Pagos del Arqueo: {{date("d-m-Y", strtotime($arqueo->fecha_hora))}} <a href="#"
                                                                                                     data-toggle="modal"
                                                                                                     data-target="#agregar"
                                                                                                     class="btn btn-success btn-xs"><i
                                        class="fa fa-edit"></i> Agrega Arqueo</a></h3>
                        <hr>
                    </div>
                </div>
                @include('arqueo.modal-agregar')
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>$ {{$arqueo->total_dia}}</h3>

                                <p>Total Capital</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbox"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>$ {{$arqueode->sum('monto') - $arqueode->sum('pago_credito') - $arqueode->sum('pago_debito')}}</h3>
                                <p>Total en Caja</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbox"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>$ {{$arqueode->sum('pago_credito')}} </h3>
                                <p>Total ganado en tarjeta de credito</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbox"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>$ {{$arqueode->sum('pago_debito')}} </h3>
                                <p>Total ganado en tarjeta debito</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbox"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="show" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th>Hora</th>
                                <th>Pago Efectivo</th>
                                <th>Pago T. Credito</th>
                                <th>Pago T. Debito</th>
                                <th>Pago Total</th>
                                <th>Opción</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{URL::to('/')}}/admin/js/jquery.dataTables.min.js"></script>
    <script>

        $('#show').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('arqueo.pago.tabla', $id)}}",
            columns: [
                {data: 'hora', name: 'hora'},
                {data: 'pago_efectivo', name: 'pago_efectivo'},
                {data: 'pago_credito', name: 'pago_credito'},
                {data: 'pago_debito', name: 'pago_debito'},
                {data: 'monto', name: 'monto'},
                {data: 'opcion', name: 'opcion', orderable: false, searchable: false}
            ],
            "language": {
                "url": "{{URL::to('/')}}/admin/Spanish.json"
            }
        });
    </script>
@endsection