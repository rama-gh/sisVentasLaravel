<?php

namespace SisVentaNew\Http\Controllers;

use SisVentaNew\Articulo;
use SisVentaNew\Devolucion;
use SisVentaNew\DevolucionDetalle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;use Yajra\DataTables\Facades\DataTables;

class DevolucionController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());

        $vali = DB::table('devolucions')->where('num_factura', $request->num_factura)->first();

        if ($vali != null) {
            toastr()->error('Ya Existe una devolución!', 'Atención');
            return Redirect::back();
        }

        $deco = new Devolucion();
        $deco->num_factura = $request->num_factura;
        $deco->idventa = $request->idventa;
        $deco->idcliente = $request->idcliente;
        $mytime = Carbon::now('America/Argentina/Mendoza');
        $deco->fecha_devolucion = $mytime->toDateTimeString();
        $deco->num_comprobante = $request->num_comprobante;
        $deco->save();

        $idarticulo = $request->get('idarticulo');
        $cantidad = $request->get('cantidad');
        $sube_resta = $request->get('suma_resta');
        $descripcion = $request->get('descripcion');

        $cont = 0;

        while ($cont < count($idarticulo)) {
            $detalle = new DevolucionDetalle();
            $detalle->iddevolucion = $deco->iddevolucion;
            $detalle->idarticulo = $idarticulo[$cont];
            if ($sube_resta[$cont] == 'sumar') {
                $arti = Articulo::find($idarticulo[$cont]);
                $arti->stock = $arti->stock + $cantidad[$cont];
                $arti->save();
            }
            $detalle->cantidad = $cantidad[$cont];
            $detalle->descripcion = $descripcion[$cont];
            $detalle->sube_resta = $sube_resta[$cont];
            $detalle->save();
            $cont = $cont + 1;
        }

        toastr()->success('Se ha devuelto el o los productos!', 'Atención');

        return Redirect::route('devolucion.show', $deco->iddevolucion);
    }

    public function index(Request $request)
    {

        $devolucion = Devolucion::with('personas')->get();

        return view('ventas.devolucion.inicio', compact('devolucion'));

    }

    public function tabla()
    {

        $devolucion = Devolucion::with('personas')->get();


        return Datatables::of($devolucion)
            ->addColumn('opcion', function ($ar) {
                return '
                        <div class="btn-group">
                          <a href="' . route('devolucion.show', $ar->iddevolucion) . '" class="btn btn-xs btn-warning"><i data-toggle="tooltip" title="Mirar Devolución: ' . $ar->num_comprobante . '"  class="fa fa-eye"></i></a>
                        </div>
                       ';
            })
            ->editColumn('fecha', function ($art) {
                return date("d-m-Y", strtotime($art->fecha_devolucion));
            })
            ->editColumn('cliente', function ($art) {
                return '<label for="' . $art->personas->nombre . '" style="text-transform: uppercase">' . $art->personas->nombre . '</label>';
            })
            ->rawColumns(['opcion', 'cliente', 'fecha'])
            ->make(true);
    }

    public function show($id)
    {
//        dd($id);
        $devolucion = DB::table('devolucions as d')
            ->join('persona as p', 'd.idcliente', '=', 'p.idpersona')
            ->where('d.iddevolucion', '=', $id)
            ->first();
        //dd($venta);
        $detalles = DB::table('devolucion_detalles as dd')
            ->join('articulo as a', 'dd.idarticulo', '=', 'a.idarticulo')
            ->where('dd.iddevolucion', '=', $id)
            ->select('dd.*', 'a.nombre')
            ->get();
//        dd($detalles);

        return view('ventas.devolucion.show', compact('detalles', 'devolucion'));
    }

    public function pdf($id)
    {
        $devolucion = DB::table('devolucions as d')
            ->join('persona as p', 'd.idcliente', '=', 'p.idpersona')
            ->where('d.iddevolucion', '=', $id)
            ->first();
        //dd($venta);
        $detalles = DB::table('devolucion_detalles as dd')
            ->join('articulo as a', 'dd.idarticulo', '=', 'a.idarticulo')
            ->where('dd.iddevolucion', '=', $id)
            ->select('dd.*', 'a.nombre')
            ->get();

        $pdf = \PDF::loadView('ventas.devolucion.pdf', compact('detalles', 'devolucion'));

//        $pdf = \PDF::loadView('pdf.estimacion' , array('estimacion'=>$estimacion, 'config'=>$config, 'detalles'=>$detalles ,'usuario'=> $usuario));

        return $pdf->stream('Detalle de la Devolución:' . $devolucion->fecha_devolucion . '.pdf');

    }
}
