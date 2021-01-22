<?php

namespace SisVentaNew\Http\Controllers;

use SisVentaNew\Arqueo;
use SisVentaNew\ArqueoDetalle;
use SisVentaNew\ArqueoPago;
use SisVentaNew\Articulo;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use SisVentaNew\Http\Requests\IngresoFormRequest;

use SisVentaNew\Ingreso;

use SisVentaNew\Persona;

use SisVentaNew\DetalleIngreso;

use DB;

use Carbon\Carbon;

use Response;

use Illuminate\Support\Collection;
use Yajra\DataTables\Facades\DataTables;
class IngresoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

        $ingreso = Ingreso::with('detalles', 'proveedor')->get();

        return view('compras.ingreso.index', compact('ingreso'));

    }

    public function tabla()
    {

        $ingreso = Ingreso::with('detalles', 'proveedor')->get();

        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

        if ($start_date && $end_date) {

            $f1 = Carbon::parse($start_date);
            $f2 = Carbon::parse($end_date);

            $ingreso = Ingreso::with('detalles', 'proveedor')
                ->orderBy('idingreso', 'desc')
                ->where("created_at", ">=", $f1)
                ->where("created_at", "<=", $f2)
                ->get();

            $start_date = date('Y-m-d', strtotime($f1));
            $end_date = date('Y-m-d', strtotime($f2));
        }


        return Datatables::of($ingreso)
            ->addColumn('opcion', function ($ar) {
                return '
                        <div class="btn-group">
                          <a href="#" data-toggle="modal" data-target="#modal-delete-' . $ar->idingreso . '" class="btn btn-xs btn-danger"><i data-toggle="tooltip" title="Anular Ingreso: ' . $ar->num_comprobante . '"  class="fa fa-trash"></i></a>
                          <a href="' . route('ingreso.show', $ar->idingreso) . '" class="btn btn-xs btn-warning"><i data-toggle="tooltip" title="Mirar Ingreso: ' . $ar->num_comprobante . '"  class="fa fa-eye"></i></a>
                        </div>
                       ';
            })
            ->editColumn('fecha', function ($art) {
                return date("d-m-Y", strtotime($art->fecha_hora));
            })
            ->editColumn('proveedor', function ($art) {
                return '<label for="' . $art->proveedor->nombre . '" style="text-transform: uppercase">' . $art->proveedor->nombre . '</label>';
            })
            ->editColumn('comprobante', function ($art) {
                return $art->tipo_comprobante . ': '.$art->num_comprobante ;
            })
            ->editColumn('total_venta', function ($art) {
                return $art->detalles->sum('precio_compra')* $art->detalles->sum('cantidad').' $';
            })
            ->editColumn('estado', function ($art) {
                if ($art->estado != "Cancelada") {
                    return '<span class="label label-danger">' . $art->estado . '</span>';
                } else {
                    return '<span class="label label-info">' . $art->estado . '</span>';
                }
            })
            ->rawColumns(['opcion', 'proveedor', 'fecha', 'comprobante', 'estado'])
            ->make(true);
    }

    public function create()
    {
        $personas = Persona::where('tipo_persona', 'Proveedor')->get();
        $articulos = Articulo::all();
        $ing = Ingreso::all()->last();
        if ($ing == null) {
            $ing = '1';
            return view("compras.ingreso.create", compact('personas','articulos','ing'));
        } else {
            $ing = Ingreso::all()->last();
            return view("compras.ingreso.create", compact('personas','articulos','ing'));
        }
    }

    public function store(IngresoFormRequest $request)
    {

            $val = Arqueo::where('estado', 'Abierto')->first();
            if ($val == null) {
                toastr()->error('Debe iniciar un arqueo, antes de realizar una venta!', 'Atención');
                return Redirect::back();
            }

            $ingreso = new Ingreso;
            $ingreso->idproveedor = $request->get('idproveedor');
            $ingreso->tipo_comprobante = $request->get('tipo_comprobante');
            $ingreso->num_comprobante = $request->get('num_comprobante');

            $mytime = Carbon::now('America/Argentina/Mendoza');
            $ingreso->fecha_hora = $mytime->toDateTimeString();
            $ingreso->impuesto = '18';
            $ingreso->estado = 'Sin cancelar';
            $ingreso->save();

            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;

            while ($cont < count($idarticulo)) {
                $detalle = new DetalleIngreso();
                $detalle->idingreso = $ingreso->idingreso;
                $detalle->idarticulo = $idarticulo[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio_compra = $precio_compra[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }

            $ing = DB::table('ingreso as i')
                ->join('detalle_ingreso as di', 'i.idingreso', '=', 'di.idingreso')
                ->select(DB::raw('sum(di.cantidad*precio_compra) as total'))
                ->where('i.idingreso', $ingreso->idingreso)
                ->first();

            $arqueo = Arqueo::where('estado', 'Abierto')->first();

            $ar = Arqueo::find($arqueo->idarqueo);
            $ar->total_dia = $arqueo->total_dia - $ing->total;
            $ar->save();
            $cont = 0;

            $pago = New ArqueoPago();
            $pago->idarqueo = $arqueo->idarqueo;
            $pago->idventa = 0;
            $pago->tipo_pago = 'Ingreso';
            $pago->pago_efectivo = -1 * $ing->total;
            $pago->pago_debito = 0;
            $pago->pago_credito = 0;
            $pago->monto = -1 * $ing->total;
            $pago->save();

            while ($cont < count($idarticulo)) {

                $ar = Articulo::find($idarticulo[$cont]);

                $arde = New ArqueoDetalle();
                $arde->idarqueo = $arqueo->idarqueo;
                $arde->monto = $precio_venta[$cont];
                $arde->cantidad = $cantidad[$cont];
                $arde->tipo_venta = 'Ingreso';
                $arde->tipo_pago = 'Ingreso';
                $arde->descripcion = 'Se Compro: ' . $ar->nombre;
                $arde->total = $cantidad[$cont] * $precio_venta[$cont];
                $arde->save();
                $cont = $cont + 1;
            }

        $ing = Ingreso::all()->last();
        $pro = Persona::findOrFail($ing->idproveedor);
        toastr()->success('Su ingreso se ha creado correctamente!', 'Atención');
        return Redirect::back();
    }

    public function show($id)
    {

        $ingreso = Ingreso::with('detalles.articulo', 'proveedor')->where('idingreso',$id)->first();
        return view("compras.ingreso.show", compact('ingreso'));
    }

    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->Estado = 'Cancelada';
        $ingreso->update();

        toastr()->error('Su ingreso se ha cencelado correctamente!', 'Atención');

        return Redirect::back();
    }
}
