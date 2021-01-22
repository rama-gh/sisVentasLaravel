<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use SisVentaNew\CuentaCorriente;
use SisVentaNew\CuentaCorrienteDetalle;
use SisVentaNew\Devolucion;
use SisVentaNew\Http\Requests\VentasFormRequest;
use SisVentaNew\Venta;
use SisVentaNew\ArqueoPago;
use SisVentaNew\DetalleVenta;
use SisVentaNew\Presupuesto;
use SisVentaNew\Persona;
use SisVentaNew\DetallePresupuesto;
use Carbon\Carbon;
use SisVentaNew\Arqueo;
use SisVentaNew\ArqueoDetalle;
use SisVentaNew\Articulo;
use Yajra\DataTables\Facades\DataTables;


class VentaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $ventas = Venta::with('detalles', 'cliente')->orderBy('idventa', 'desc')->get();
        return view('ventas.venta.indexx', compact('ventas'));
    }

    public function create()
    {
        $personas = Persona::where('tipo_persona', 'Cliente')->get();

        $articulos = Articulo::with('detalleIngresos')
            ->where('estado', 'Activo')
            ->where('stock', '>', '0')
            ->select(DB::raw('CONCAT(articulo.codigo, " ",articulo.nombre) AS articulo'), 'articulo.idarticulo', 'articulo.stock',
                DB::raw('(SELECT precio_venta From detalle_ingreso Where idarticulo = articulo.idarticulo order by iddetalle_ingreso desc limit 0,1)
                 as precio_promedio'))
            ->get();

//        dd($articulos);

        $ven = Venta::all()->last();
        if ($ven == null) {
            $ven = '1';
            return view("ventas.venta.create", compact('personas', 'articulos', 'ven'));
        } else {
            return view("ventas.venta.create", compact('personas', 'articulos', 'ven'));
        }


    }

    public function tabla()
    {

        $ventas = Venta::with('detalles', 'cliente')->orderBy('idventa', 'desc')->get();

        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

        if ($start_date && $end_date) {

            $f1 = Carbon::parse($start_date);
            $f2 = Carbon::parse($end_date);

            $ventas = Venta::with('detalles', 'cliente')
                ->orderBy('idventa', 'desc')
                ->where("created_at", ">=", $f1)
                ->where("created_at", "<=", $f2)
                ->get();

            $start_date = date('Y-m-d', strtotime($f1));
            $end_date = date('Y-m-d', strtotime($f2));
        }


        return Datatables::of($ventas)
            ->addColumn('opcion', function ($ar) {
                return '
                        <div class="btn-group">
                          <a href="#" data-toggle="modal" data-target="#modal-delete-' . $ar->idventa . '" class="btn btn-xs btn-danger"><i data-toggle="tooltip" title="Anular Venta: ' . $ar->num_comprobante . '"  class="fa fa-trash"></i></a>
                          <a href="' . route('venta.show', $ar->idventa) . '" class="btn btn-xs btn-warning"><i data-toggle="tooltip" title="Mirar Venta: ' . $ar->num_comprobante . '"  class="fa fa-eye"></i></a>
                        </div>
                       ';
            })
            ->editColumn('fecha', function ($art) {
                return date("d-m-Y", strtotime($art->fecha_hora));
            })
            ->editColumn('cliente', function ($art) {
                return '<label for="' . $art->cliente->nombre . '" style="text-transform: uppercase">' . $art->cliente->nombre . '</label>';
            })
            ->editColumn('comprobante', function ($art) {
                return '<a href="' . route('venta.ticke', $art->idventa) . '">' . $art->tipo_comprobante . ': ' . $art->num_comprobante . '</a>';
            })
            ->editColumn('total_venta', function ($art) {
                return $art->total_venta . ' $';
            })
            ->editColumn('estado', function ($art) {
                if ($art->estado == "Sin Revisar") {
                    return '<span class="label label-danger">' . $art->estado . '</span>';
                } else {
                    return '<span class="label label-info">' . $art->estado . '</span>';
                }
            })
            ->rawColumns(['opcion', 'cliente', 'fecha', 'comprobante', 'estado'])
            ->make(true);
    }

    public function store(VentasFormRequest $request)
    {

        $val = Arqueo::where('estado', 'Abierto')->first();
        if ($val == null) {
            toastr()->error('Debe iniciar un arqueo, antes de realizar una venta!', 'Atención');
            return Redirect::back();
        }

        $fecha =Venta::orderBy('idventa', 'desc')->first();
        $mytime = Carbon::now('America/Argentina/Mendoza');
        $ventaact = $mytime->toDateString();



        if ($request->tipo_venta == 'Cuenta Corriente')
        {

            $corriente = CuentaCorriente::where('idcliente', $request->idcliente)->where('estado','Sin Cancelar')->first();
            $ultimo = Venta::orderBy('idventa', 'desc')->first();
            $ultimo2 = CuentaCorriente::orderBy('idcuenta_corriente', 'desc')->first();
            if ($corriente == null)
            {
                $to = $request->get('total_venta') + $request->get('monto_porcentaje');
                $venta = new CuentaCorriente();
                $venta->idcliente = $request->get('idcliente');
                $venta->tipo_comprobante = $request->get('tipo_comprobante');
                $venta->num_comprobante =   $ultimo->idventa;
                $venta->monto_porcentaje = $request->get('monto_porcentaje');
                $venta->porcentaje_credito = $request->get('porcentaje_credito');
                $venta->total_venta = $to;
                $venta->paga = $request->paga;
                $venta->tarjeta_debito = $request->tarjeta_debito;
                $venta->tarjeta_credito = $request->tarjeta_credito;

                $mytime = Carbon::now('America/Argentina/Mendoza');
                $venta->fecha_hora = $mytime->toDateTimeString();
                $venta->impuesto = '21';
                $venta->estado = 'Sin Cancelar';
                $venta->save();

                $idarticulo = $request->get('idarticulo');
                $cantidad = $request->get('cantidad');
                $descuento = $request->get('descuento');
                $precio_venta = $request->get('precio_venta');


                if ($request->paga != 0) {
                    $pago = 'Efectivo';
                }
                if ($request->tarjeta_debito != 0) {
                    $pago = 'Tarjeta de Debito';
                }
                if ($request->tarjeta_credito != 0) {
                    $pago = 'Tarjeta de Credito';
                }

                $arqueo = Arqueo::where('estado', 'Abierto')->first();

                $ar = Arqueo::find($arqueo->idarqueo);
                $ar->total_dia = $arqueo->total_dia + $to;
                $ar->save();

                $pago = New ArqueoPago();
                $pago->idarqueo = $arqueo->idarqueo;
                $pago->idventa = 0;
                $pago->idingreso = 0;
                $pago->tipo_pago = 'Cuenta Corriente';

                if ($request->tarjeta_debito == 0 and $request->tarjeta_credito == 0 and $request->paga != 0) {
//                efectivo
                    $pago->pago_efectivo = $request->get('total_venta');
                    $pago->pago_debito = $request->tarjeta_debito;
                    $pago->pago_credito = $request->tarjeta_credito;

                } elseif ($request->paga == 0) {
//                debito y credito
                    $pago->pago_efectivo = $request->paga;
                    $pago->pago_debito = $request->tarjeta_debito;
                    $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

                } elseif ($request->paga != 0 and $request->tarjeta_credito != 0) {
//                credito y efectivo

                    $total = (($request->tarjeta_credito + ($request->paga - $request->get('total_venta'))) - $request->paga) * -1;

                    $pago->pago_efectivo = $total;
                    $pago->pago_debito = $request->tarjeta_debito;
                    $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

                } elseif ($request->paga != 0 and $request->tarjeta_debito != 0) {
//                debito y efectivo

                    $total = (($request->tarjeta_debito + ($request->paga - $request->get('total_venta'))) - $request->paga) * -1;

                    $pago->pago_efectivo = $total;
                    $pago->pago_debito = $request->tarjeta_debito;
                    $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

                }
                $pago->monto = $to;
                $pago->save();

                $cont = 0;

                while ($cont < count($idarticulo)) {
                    $detalle = new CuentaCorrienteDetalle();
                    $detalle->idcuenta_corriente = $venta->idcuenta_corriente;
                    $detalle->idarticulo = $idarticulo[$cont];
                    $detalle->cantidad = $cantidad[$cont];
                    $detalle->descuento = $descuento[$cont];
                    $detalle->precio_venta = $precio_venta[$cont];
                    $detalle->save();

                    $ar = Articulo::find($idarticulo[$cont]);

                    $arde = New ArqueoDetalle();
                    $arde->idarqueo = $arqueo->idarqueo;
                    $arde->monto = $precio_venta[$cont];
                    $arde->cantidad = $cantidad[$cont];
                    $arde->tipo_venta = 'Cuenta Corriente';
                    $arde->tipo_pago = $pago;
                    $arde->descripcion = 'Se Vendio: ' . $ar->nombre;
                    $arde->total = $cantidad[$cont] * $precio_venta[$cont];
                    $arde->save();

                    $cont = $cont + 1;
                }
            }
            else
            {
                $corriente = CuentaCorriente::where('idcliente', $request->idcliente)->where('estado','Sin Cancelar')->first();

                $to = $request->get('total_venta') + $request->get('monto_porcentaje');

                $corrienteCorriente = CuentaCorriente::find($corriente->idcuenta_corriente);
                $corrienteCorriente->total_venta = $to + $corriente->total_venta;
                $corrienteCorriente->paga = $request->paga + $corriente->paga;
                $corrienteCorriente->tarjeta_debito = $request->tarjeta_debito + $corriente->tarjeta_debito;
                $corrienteCorriente->tarjeta_credito = $request->tarjeta_credito + $corriente->tarjeta_credito;
                $corrienteCorriente->save();

                $idarticulo = $request->get('idarticulo');
                $cantidad = $request->get('cantidad');
                $descuento = $request->get('descuento');
                $precio_venta = $request->get('precio_venta');




                if ($request->paga != 0) {
                    $pago = 'Efectivo';
                }
                if ($request->tarjeta_debito != 0) {
                    $pago = 'Tarjeta de Debito';
                }
                if ($request->tarjeta_credito != 0) {
                    $pago = 'Tarjeta de Credito';
                }

                $arqueo = Arqueo::where('estado', 'Abierto')->first();

                $ar = Arqueo::find($arqueo->idarqueo);
                $ar->total_dia = $arqueo->total_dia + $to;
                $ar->save();

                $pago = New ArqueoPago();
                $pago->idarqueo = $arqueo->idarqueo;
                $pago->idventa = 0;
                $pago->idingreso = 0;
                $pago->tipo_pago = 'Cuenta Corriente';

                if ($request->tarjeta_debito == 0 and $request->tarjeta_credito == 0 and $request->paga != 0) {
//                efectivo
                    $pago->pago_efectivo = $request->get('total_venta');
                    $pago->pago_debito = $request->tarjeta_debito;
                    $pago->pago_credito = $request->tarjeta_credito;

                } elseif ($request->paga == 0) {
//                debito y credito
                    $pago->pago_efectivo = $request->paga;
                    $pago->pago_debito = $request->tarjeta_debito;
                    $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

                } elseif ($request->paga != 0 and $request->tarjeta_credito != 0) {
//                credito y efectivo

                    $total = (($request->tarjeta_credito + ($request->paga - $request->get('total_venta'))) - $request->paga) * -1;

                    $pago->pago_efectivo = $total;
                    $pago->pago_debito = $request->tarjeta_debito;
                    $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

                } elseif ($request->paga != 0 and $request->tarjeta_debito != 0) {
//                debito y efectivo

                    $total = (($request->tarjeta_debito + ($request->paga - $request->get('total_venta'))) - $request->paga) * -1;

                    $pago->pago_efectivo = $total;
                    $pago->pago_debito = $request->tarjeta_debito;
                    $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

                }
                $pago->monto = $to;
                $pago->save();

                $cont = 0;

                while ($cont < count($idarticulo)) {
                    $detalle = new CuentaCorrienteDetalle();
                    $detalle->idcuenta_corriente = $corriente->idcuenta_corriente;
                    $detalle->idarticulo = $idarticulo[$cont];
                    $detalle->cantidad = $cantidad[$cont];
                    $detalle->descuento = $descuento[$cont];
                    $detalle->precio_venta = $precio_venta[$cont];
                    $detalle->save();

                    $ar = Articulo::find($idarticulo[$cont]);

                    $arde = New ArqueoDetalle();
                    $arde->idarqueo = $arqueo->idarqueo;
                    $arde->monto = $precio_venta[$cont];
                    $arde->cantidad = $cantidad[$cont];
                    $arde->tipo_venta = 'Cuenta Corriente';
                    $arde->tipo_pago = $pago;
                    $arde->descripcion = 'Se Vendio: ' . $ar->nombre;
                    $arde->total = $cantidad[$cont] * $precio_venta[$cont];
                    $arde->save();

                    $cont = $cont + 1;
                }
            }
        }

        else
        {

            $to = $request->get('total_venta') + $request->get('monto_porcentaje');
            $venta = new Venta;
            $venta->idcliente = $request->get('idcliente');
            $venta->tipo_comprobante = $request->get('tipo_comprobante');
            $venta->num_comprobante = $request->get('num_comprobante');
            $venta->monto_porcentaje = $request->get('monto_porcentaje');
            $venta->porcentaje_credito = $request->get('porcentaje_credito');
            $venta->total_venta = $to;
            $venta->idusuario = $request->get('idusuario');
            $venta->paga = $request->paga;
            $venta->tarjeta_debito = $request->tarjeta_debito;
            $venta->tarjeta_credito = $request->tarjeta_credito;

            $mytime = Carbon::now('America/Argentina/Mendoza');
            $venta->fecha_hora = $mytime->toDateTimeString();
            $venta->impuesto = '21';
            $venta->estado = 'Sin Cancelar';
            $venta->save();

            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $precio_venta = $request->get('precio_venta');


            if ($request->paga != 0) {
                $pago = 'Efectivo';
            }
            if ($request->tarjeta_debito != 0) {
                $pago = 'Tarjeta de Debito';
            }
            if ($request->tarjeta_credito != 0) {
                $pago = 'Tarjeta de Credito';
            }

            $arqueo = Arqueo::where('estado', 'Abierto')->first();

            $ar = Arqueo::find($arqueo->idarqueo);
            $ar->total_dia = $arqueo->total_dia + $to;
            $ar->save();

            $pago = New ArqueoPago();
            $pago->idarqueo = $arqueo->idarqueo;
            $pago->idventa = $venta->idventa;
            $pago->idingreso = 0;
            $pago->tipo_pago = 'Venta';

            if ($request->tarjeta_debito == 0 and $request->tarjeta_credito == 0 and $request->paga != 0) {
//                efectivo
                $pago->pago_efectivo = $request->get('total_venta');
                $pago->pago_debito = $request->tarjeta_debito;
                $pago->pago_credito = $request->tarjeta_credito;

            } elseif ($request->paga == 0) {
//                debito y credito
                $pago->pago_efectivo = $request->paga;
                $pago->pago_debito = $request->tarjeta_debito;
                $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

            } elseif ($request->paga != 0 and $request->tarjeta_credito != 0) {
//                credito y efectivo

                $total = (($request->tarjeta_credito + ($request->paga - $request->get('total_venta'))) - $request->paga) * -1;

                $pago->pago_efectivo = $total;
                $pago->pago_debito = $request->tarjeta_debito;
                $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

            } elseif ($request->paga != 0 and $request->tarjeta_debito != 0) {
//                debito y efectivo

                $total = (($request->tarjeta_debito + ($request->paga - $request->get('total_venta'))) - $request->paga) * -1;

                $pago->pago_efectivo = $total;
                $pago->pago_debito = $request->tarjeta_debito;
                $pago->pago_credito = $request->tarjeta_credito + $request->get('monto_porcentaje');

            }
            $pago->monto = $to;
            $pago->save();

            $cont = 0;

            while ($cont < count($idarticulo)) {
                $detalle = new DetalleVenta();
                $detalle->idventa = $venta->idventa;
                $detalle->idarticulo = $idarticulo[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->descuento = $descuento[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();

                $ar = Articulo::find($idarticulo[$cont]);

                $arde = New ArqueoDetalle();
                $arde->idarqueo = $arqueo->idarqueo;
                $arde->monto = $precio_venta[$cont];
                $arde->cantidad = $cantidad[$cont];
                $arde->tipo_venta = 'Venta';
                $arde->tipo_pago = $pago;
                $arde->descripcion = 'Se Vendio: ' . $ar->nombre;
                $arde->total = $cantidad[$cont] * $precio_venta[$cont];
                $arde->save();

                $cont = $cont + 1;
            }
        }



        toastr()->success('Su venta se ha creado correctamente!', 'Atención');
        return Redirect::back();
    }

    public function show($id)
    {
        $venta = Venta::with('detalles.articulo', 'cliente', 'usuario')->where('idventa', $id)->orderBy('idventa', 'desc')->first();
        $devo = Devolucion::all();

        return view("ventas.venta.show", compact('venta', 'devo'));

    }

    public function ticke($id)
    {
        $venta = Venta::with('detalles.articulo', 'cliente', 'usuario')->where('idventa', $id)->orderBy('idventa', 'desc')->first();
        return view("ventas.venta.tickes", compact('venta'));

    }

    public function destroy($id)
    {
        $venta = Venta::find($id);
        $venta->estado = 'Revisada';
        $venta->save();
        toastr()->error('Su venta se ha anulado correctamente!', 'Atención');
        return Redirect::back();
    }
}
