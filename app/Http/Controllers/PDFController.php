<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use SisVentaNew\Arqueo;
use SisVentaNew\ArqueoPago;
use Illuminate\Http\Request;

use SisVentaNew\Articulo;
use SisVentaNew\Categoria;

use SisVentaNew\Config;
use SisVentaNew\CuentaCorriente;
use SisVentaNew\Http\Requests;

use Illuminate\Http\Collection;

use SisVentaNew\Ingreso;
use SisVentaNew\Persona;
use SisVentaNew\Venta;

class PDFController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function categoria()
    {
        $categoria = Categoria::All();

        view()->share('categoria', $categoria);

        $pdf = \PDF::loadView('pdf.categoria');

        return $pdf->download('Todas las Categorias.pdf');

    }

    public function cliente()
    {
        $personas = Persona::with('ventas.detalles')->where('tipo_persona', 'Cliente')->get();
        $pdf = \PDF::loadView('pdf.cliente', compact('personas'));
        return $pdf->download('Clientes.pdf');
    }

    public function proveedor()
    {
        $personas = Persona::with('ingresos.detalles')->where('tipo_persona', 'Proveedor')->get();
        $pdf = \PDF::loadView('pdf.proveedor', compact('personas'));
        return $pdf->download('Proveedores.pdf');
    }

    public function venta($id)
    {
        $venta = Venta::with('detalles.articulo', 'cliente', 'usuario')->where('idventa', $id)->orderBy('idventa', 'desc')->first();
        $config = DB::table('config')->first();
        $pdf = \PDF::loadView('pdf.venta', compact('venta'));
        return $pdf->download('Venta:' . $venta->cliente->nombre . '.pdf');

    }

    public function corriente($id)
    {
        $venta = CuentaCorriente::with('detalles.articulo', 'cliente')->where('idcuenta_corriente', $id)->first();
        $config = DB::table('config')->first();
        $pdf = \PDF::loadView('pdf.corriente', compact('venta'));
        return $pdf->download('Venta:' . $venta->cliente->nombre . '.pdf');

    }

    public function ingreso($id)
    {
        $ingreso = Ingreso::with('detalles', 'proveedor')->where('idingreso', $id)->first();
        $config = DB::table('config')->first();
        $pdf = \PDF::loadView('pdf.ingreso', compact('ingreso', 'config'));

        return $pdf->download('Ingreso:' . $ingreso->nombre . '.pdf');
    }

    public function presupuesto($id)
    {
        $pre = DB::table('presupuesto as v')
            ->join('persona as p', 'v.idcliente', '=', 'p.idpersona')
            ->join('detalle_presupuesto as dv', 'v.idpresupuesto', '=', 'dv.idpresupuesto')
            ->select('v.idpresupuesto', 'v.fecha_hora', 'p.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta', 'idusuario')
            ->groupBy('v.idpresupuesto', 'v.fecha_hora', 'p.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta', 'idusuario')
            ->where('v.idpresupuesto', '=', $id)
            ->first();
        $detalles = DB::table('detalle_presupuesto as d')
            ->join('articulo as a', 'd.idarticulo', '=', 'a.idarticulo')
            ->select('a.nombre as articulo', 'd.created_at', 'd.cantidad', 'd.descuento', 'd.precio_venta')
            ->where('d.idpresupuesto', '=', $id)
            ->get();
        $usuario = DB::table('users')
            ->where('id', '=', $pre->idusuario)
            ->first();
        $config = DB::table('config')
            ->first();
        $pdf = \PDF::loadView('pdf.presupuesto', array('pre' => $pre, 'config' => $config, 'detalles' => $detalles, 'usuario' => $usuario));

        return $pdf->stream('Detalle De la Recaudación Diaria:' . $pre->fecha_hora . '.pdf');

        //  return $pdf->download('Todas las Categorias.pdf');
    }

    public function estimacion($id)
    {
        $estimacion = DB::table('estimacion as e')
            ->join('detalle_estimacion as de', 'e.idestimacion', '=', 'de.idestimacion')
            ->select('e.idestimacion', 'e.fecha_hora', 'e.impuesto', 'e.estado', 'e.total_venta', 'e.idusuario')
            ->groupBy('e.idestimacion', 'e.fecha_hora', 'e.impuesto', 'e.estado', 'e.total_venta', 'e.idusuario')
            ->where('e.idestimacion', '=', $id)
            ->first();
        //dd($estimacion);
        $detalles = DB::table('detalle_estimacion as d')
            ->join('articulo as a', 'd.idarticulo', '=', 'a.idarticulo')
            ->select('a.nombre as articulo', 'd.created_at', 'd.cantidad', 'd.descuento', 'd.precio_venta')
            ->where('d.idestimacion', '=', $id)
            ->get();
        // dd($detalles);
        $usuario = DB::table('users')
            ->where('id', '=', $estimacion->idusuario)
            ->first();
        $config = DB::table('config')
            ->first();
        $pdf = \PDF::loadView('pdf.estimacion', array('estimacion' => $estimacion, 'config' => $config, 'detalles' => $detalles, 'usuario' => $usuario));

        return $pdf->stream('Detalle Del Presupuesto:' . $estimacion->fecha_hora . '.pdf');

        //  return $pdf->download('Todas las Categorias.pdf');
    }


    public function mensual($id)
    {
        $mensual = DB::table('mensual as v')
            ->join('persona as p', 'v.idcliente', '=', 'p.idpersona')
            ->join('detalle_mensual as dv', 'v.idmensual', '=', 'dv.idmensual')
            ->select('v.idmensual', 'v.fecha_hora', 'p.nombre', 'p.tipo_documento', 'p.num_documento', 'p.direccion', 'p.telefono', 'p.email', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta', 'idusuario')
            ->groupBy('v.idmensual', 'v.fecha_hora', 'p.nombre', 'p.tipo_documento', 'p.num_documento', 'p.direccion', 'p.telefono', 'p.email', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta', 'idusuario')
            ->where('v.idmensual', '=', $id)
            ->first();
        //dd($venta);
        $detalles = DB::table('detalle_mensual as d')
            ->join('articulo as a', 'd.idarticulo', '=', 'a.idarticulo')
            ->select('a.nombre as articulo', 'd.created_at', 'd.cantidad', 'd.descuento', 'd.precio_venta')
            ->where('d.idmensual', '=', $id)
            ->get();
        $usuario = DB::table('users')
            ->where('id', '=', $mensual->idusuario)
            ->first();
        $config = DB::table('config')
            ->first();
        $entrega = DB::table('mensual_entregas')->where('idmensual', $id)->get();

        $pdf = \PDF::loadView('pdf.mensual', array('mensual' => $mensual, 'entrega' => $entrega, 'detalles' => $detalles, 'usuario' => $usuario, 'config' => $config));

        return $pdf->stream('Cuenta Corriente:' . $mensual->nombre . '.pdf');
    }


    public function codigoarticulo(Request $request)
    {
        if ($request->idarticulo == null) {
            toastr()->error('Debe seleccionar al menos un articulo.', 'Error!');
            return Redirect::back();
        }

        $articulos = Articulo::with('categorias')
            ->whereIn('idarticulo', $request->idarticulo)
            ->get();

        $pdf = \PDF::loadView('pdf.pdfcodigo', compact('articulos'));

        return $pdf->stream('Articulos.pdf');
    }

    public function arqueo()
    {
        DB::statement("SET lc_time_names = 'es_ES'");
        $resultado = ArqueoPago::where('tipo_pago', 'Venta')->selectRaw('year(created_at) year, monthname(created_at) monthname, month(created_at) month, sum(pago_efectivo) efectivo, sum(pago_debito) debito, sum(pago_credito) credito, sum(pago_credito+pago_debito+pago_efectivo) data')
            ->groupBy('year', 'month', 'monthname')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();


        $config = DB::table('config')
            ->first();

        $pdf = \PDF::loadView('pdf.arqueo', array('resultado' => $resultado, 'config' => $config));

        return $pdf->stream('Arqueo Mensual.pdf');
    }
}
