<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SisVentaNew\CuentaCorriente;
use Yajra\DataTables\Facades\DataTables;

class CuentaCorrienteController extends Controller
{
    public function index ()
    {
       $corriente =  CuentaCorriente::with('detalles.articulo','cliente')->get();

        return view('corriente.index', compact('corriente'));
    }

    public function tabla()
    {

        $corriente =  CuentaCorriente::with('detalles.articulo','cliente')->get();


        return Datatables::of($corriente)
            ->addColumn('opcion', function ($ar) {

                if ($ar->estado == 'Cancelado' )
                {
                    return '
                        <div class="btn-group">
                          <a disabled class="btn btn-xs btn-danger"><i data-toggle="tooltip" title="Anular Cuenta Corriente: ' . $ar->cliente->nombre . '"  class="fa fa-window-close"></i></a>
                          <a href="' . route('corriente.show', $ar->idcuenta_corriente) . '" class="btn btn-xs btn-warning"><i data-toggle="tooltip" title="Mirar Cuenta Corriente: ' . $ar->cliente->nombre . '"  class="fa fa-eye"></i></a>
                        </div>
                       ';
                }
                else{
                    return '
                        <div class="btn-group">
                          <a href="#" data-toggle="modal" data-target="#modal-editar-' . $ar->idcuenta_corriente . '" class="btn btn-xs btn-danger"><i data-toggle="tooltip" title="Anular Cuenta Corriente: ' . $ar->cliente->nombre . '"  class="fa fa-window-close"></i></a>
                          <a href="' . route('corriente.show', $ar->idcuenta_corriente) . '" class="btn btn-xs btn-warning"><i data-toggle="tooltip" title="Mirar Cuenta Corriente: ' . $ar->cliente->nombre . '"  class="fa fa-eye"></i></a>
                        </div>
                       ';
                }

            })
            ->editColumn('fecha', function ($art) {
                return date("d-m-Y", strtotime($art->fecha_hora));
            })
            ->editColumn('cliente', function ($art) {
                return '<label for="' . $art->cliente->nombre . '" style="text-transform: uppercase">' . $art->cliente->nombre . '</label>';
            })
            ->editColumn('pagado', function ($art) {
                return  $art->paga + $art->tarjeta_debito + $art->tarjeta_credito . ' $ ' ;
            })
            ->editColumn('comprobante', function ($art) {
                return $art->tipo_comprobante . ': ' . $art->num_comprobante ;
            })
            ->editColumn('total_venta', function ($art) {
                return $art->total_venta . ' $';
            })
            ->editColumn('estado', function ($art) {
                if ($art->estado == "Sin Cancelar") {
                    return '<span class="label label-danger">' . $art->estado . '</span>';
                } else {
                    return '<span class="label label-info">' . $art->estado . '</span>';
                }
            })
            ->rawColumns(['opcion', 'cliente', 'fecha', 'comprobante', 'estado'])
            ->make(true);
    }

    public function show($id)
    {
        $venta = CuentaCorriente::with('detalles.articulo', 'cliente')->where('idcuenta_corriente', $id)->first();
//        dd($venta);
        return view("corriente.show", compact('venta'));

    }

    public function update(Request $request, $id)
    {
        $corriente = CuentaCorriente::find($id);
        $corriente->paga = $request->paga + $corriente->paga;
        $corriente->tarjeta_debito = $request->tarjeta_debito + $corriente->tarjeta_debito;
        $corriente->tarjeta_credito = $request->tarjeta_credito + $corriente->tarjeta_credito;
        $corriente->save();

        $suma = $corriente->paga + $corriente->tarjeta_debito + $corriente->tarjeta_credito;


        if ($suma == $corriente->total_venta or $suma >= $corriente->total_venta)
        {
            $corriente = CuentaCorriente::find($id);
            $corriente->estado = 'Cancelado';
            $corriente->save();
        }
        toastr()->success('El pago se ha afectuado correctamente!', 'Atención');

        return Redirect::back();
    }

}
