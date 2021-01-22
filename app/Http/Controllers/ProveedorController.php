<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SisVentaNew\Http\Requests\PersonaFormRequest;
use SisVentaNew\Persona;
use SisVentaNew\Config;
use Yajra\DataTables\Facades\DataTables;
class ProveedorController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }
    public function index(Request $request)
    {
        $personas = Persona::with('ingresos.detalles')->where('tipo_persona', 'Proveedor')->get();

        return view('compras.proveedor.indexx', compact('personas'));
    }

    public function tabla()
    {
        $personas = Persona::with('ingresos.detalles')->where('tipo_persona', 'Proveedor')->get();

        return Datatables::of($personas)
            ->addColumn('opcion', function ($ar) {
                return '
                        <div class="btn-group">
                          <a href="#" data-toggle="modal" data-target="#modal-borrar-' . $ar->idpersona . '" class="btn btn-xs btn-danger"><i data-toggle="tooltip" title="Borrar Proveedor: ' . $ar->nombre . '"  class="fa fa-trash"></i></a>
                          <a href="#" data-toggle="modal" data-target="#modal-editar-' . $ar->idpersona . '" class="btn btn-xs btn-info"><i data-toggle="tooltip" title="Editar Proveedor: ' . $ar->nombre . '"  class="fa fa-edit"></i></a>
                          <a href="#" data-toggle="modal" data-target="#modal-show-' . $ar->idpersona . '" class="btn btn-xs btn-warning"><i data-toggle="tooltip" title="Mirar Proveedor: ' . $ar->nombre . '"  class="fa fa-eye"></i></a>
                        </div>
                       ';
            })
            ->editColumn('nombre', function ($art) {
                return '<label for="'.$art->idpersona.'" style="text-transform: uppercase">' . $art->nombre . '</label>';
            })
            ->editColumn('documento', function ($art) {
                return $art->tipo_documento . ' - ' . $art->num_documento;
            })
            ->rawColumns(['opcion', 'nombre'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->tipo_persona = 'Proveedor';
        $persona->nombre = $request->get('nombre');
        $persona->tipo_documento = $request->get('tipo_documento');
        $persona->num_documento = $request->get('num_documento');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->save();


        toastr()->success('Su proveedor se ha agregado correctamente!', '' . $request->nombre);

        return Redirect::back();
    }

    public function update(PersonaFormRequest $request, $id)
    {
        // dd($request);
        $persona = Persona::find($id);
        $persona->nombre = $request->get('nombre');
        $persona->tipo_documento = $request->get('tipo_documento');
        $persona->num_documento = $request->get('num_documento');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->save();

        toastr()->info('Su proveedor se ha editado correctamente!', '' . $request->nombre);

        return Redirect::back();
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->tipo_persona = 'Inactivo';
        $persona->save();

        toastr()->error('Su proveedor se ha borrado correctamente!', '' . $persona->nombre);
        return Redirect::back();
    }
}
