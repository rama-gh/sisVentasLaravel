<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use SisVentaNew\Categoria;
use Illuminate\Support\Facades\Redirect;
use SisVentaNew\Http\Requests\CategoriaFormRequest;
use SisVentaNew\Config;
use Yajra\DataTables\Facades\DataTables;






class CategoriaController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $categorias = Categoria::where('condicion',1)->get();

        return view('almacen.categoria.indexx', compact('categorias'));
    }

    public function tabla ()
    {
        $categorias = Categoria::where('condicion',1)->get();

        return Datatables::of($categorias)
            ->addColumn('opcion', function ($ar) {
                return '
                        <div class="btn-group">
                          <a href="#" data-toggle="modal" data-target="#modal-borrar-' . $ar->idcategoria . '" class="btn btn-xs btn-danger"><i data-toggle="tooltip" title="Borrar Categoría: '.$ar->nombre.'"  class="fa fa-trash"></i></a>
                          <a href="#" data-toggle="modal" data-target="#modal-editar-' . $ar->idcategoria . '" class="btn btn-xs btn-info"><i data-toggle="tooltip" title="Editar Categoría: '.$ar->nombre.'"  class="fa fa-edit"></i></a>
                        </div>
                       ';
            })
            ->editColumn('nombre', function ($art) {
                return '<label style="text-transform: uppercase" for="label-'.$art->nombre.'">'.$art->nombre.'</label>';
            })
            ->rawColumns(['nombre','opcion'])
            ->make(true);
    }

    public function store(CategoriaFormRequest $request)
    {

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/restaurante.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://restaurante-61d03.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();
        $newPost = $database
        ->getReference('categorias')
        ->push([
            'nombre' =>$request->get('nombre'),
            'descripcion' =>$request->get('descripcion'),
            'condicion' =>'1',
        ]);



        $categoria = new Categoria;
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->condicion = '1';
        $categoria->save();

        toastr()->success('Su categoría fue creada correcatamente', ''.  $request->nombre);

        return Redirect::back();
    }

    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->save();


        toastr()->info('Su categoría fue editada correcatamente', ''.  $request->nombre);

        return Redirect::back();
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->condicion = '0';
        $categoria->save();

        toastr()->error('Su categoría fue borrada correcatamente', ''.  $categoria->nombre);

        return Redirect::back();
    }
}
