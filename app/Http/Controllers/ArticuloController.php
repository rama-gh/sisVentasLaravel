<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Support\Facades\URL;
use SisVentaNew\DetalleIngreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SisVentaNew\Articulo;
use SisVentaNew\Categoria;
use SisVentaNew\Config;
use Yajra\DataTables\Facades\DataTables;
class ArticuloController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function cambiar(Request $request, $id)
  {
      if ($request->precio_venta == null and $request->precio_compra == null)
      {
          toastr()->error('Tiene que llenar algun tipo de campo!', 'Atención');
          return Redirect::back();
      }

      $detalle = DetalleIngreso::where('idarticulo', $id)->orderBy('iddetalle_ingreso', 'desc')->first();
      $det = DetalleIngreso::find($detalle->iddetalle_ingreso);
      if ($request->precio_compra != null)
      {
          $det->precio_compra = $request->precio_compra;
      }
      if ($request->precio_venta != null)
      {
          $det->precio_venta = $request->precio_venta;
      }
      $det->save();

      toastr()->success('Sus precios se han editado correctamente!', 'Atención');
      return Redirect::back();


  }
  public function index(Request $request)
  {
      $cate = Config::all()->first();

      $categorias = Categoria::All();

      $articulos = Articulo::with('categorias','detalleVentas','detalleIngresos', 'detalleDevoluciones')->where('estado','Activo')->get();


    return view('almacen.articulo.indexx', compact('articulos','categorias','cate'));
  }
  public function tabla()
  {
      $articulos = Articulo::with('categorias')->where('estado','Activo')->get();

      return Datatables::of($articulos)
          ->addColumn('opcion', function ($ar) {
              return '
                        <div class="btn-group">
                          <a href="#" data-toggle="modal" data-target="#modal-borrar-' . $ar->idarticulo . '" class="btn btn-xs btn-danger"><i data-toggle="tooltip" title="Borrar Artículo: '.$ar->nombre.'"  class="fa fa-trash"></i></a>
                          <a href="#" data-toggle="modal" data-target="#modal-editar-' . $ar->idarticulo . '" class="btn btn-xs btn-info"><i data-toggle="tooltip" title="Editar Artículo: '.$ar->nombre.'"  class="fa fa-edit"></i></a>
                          <a href="#" data-toggle="modal" data-target="#modal-show-' . $ar->idarticulo . '" class="btn btn-xs btn-warning"><i data-toggle="tooltip" title="Mirar Artículo: '.$ar->nombre.'"  class="fa fa-eye"></i></a>
                        </div>
                       ';
          })
          ->editColumn('imagen', function ($art) {
              if ($art->imagen == "image.jpg")
              {
                  return 'No tiene imagen';
              }
              else
              {
                  return '<img class="center-block img-responsive" src="'.URL::to('/').'/imagenes/articulos/'.$art->imagen.'">';
              }
          })
          ->editColumn('idcategoria', function ($art) {
             return $art->categorias->nombre;
          })
          ->editColumn('nombre', function ($art) {
              return '<input name="idarticulo[]" form="pdfcodigo" id="label-'.$art->idarticulo.'" type="checkbox" value="'.$art->idarticulo.'"> - <label style="text-transform: uppercase" for="label-'.$art->idarticulo.'">'.$art->nombre.'</label>';
          })
          ->rawColumns(['opcion','imagen','nombre', 'estado','idcategoria'])
          ->make(true);
  }
  public function store(Request $request)
  {
      $articulo=new Articulo;
      $articulo->idcategoria=$request->idcategoria;
      if ($request->codigo == '' || $request->codigo == null) {
          srand((double) microtime( )*1000000);  //Introducimos la "semilla"
          $aleat = rand(1,999999999999);    //rand(mínimo,máximo);
          $articulo->codigo=$aleat;
      }else {
          $articulo->codigo=$request->codigo;
      }
      $articulo->nombre=$request->nombre;
      $articulo->stock= $request->stock;
      $articulo->descripcion=$request->descripcion;
      $articulo->estado='Activo';
      if ($request->file('imagen')) {
          $file= $request->file('imagen');
          $file->move(public_path().'/imagenes/articulos/', stripAccents($file->getClientOriginalName()));
          $articulo->imagen=$file->getClientOriginalName();
      }
      $articulo->save();

      toastr()->success('Su artículo se ha agregado correctamente!', ''.$request->nombre);

      return Redirect::back();
  }
  public function show($id)
  {

    $articulodetallei = DB::table('detalle_ingreso as ingreso')
    ->where('ingreso.idarticulo', $id)
    ->get();
    $articulodetallev = DB::table('detalle_venta as venta')
    ->where('venta.idarticulo', $id)
    ->get();
    $articulodetallem = DB::table('detalle_mensual as mensual')
    ->where('mensual.idarticulo', $id)
    ->get();
    $todo= collect([$articulodetallei,$articulodetallev,$articulodetallem])->collapse();
    $todo2= $todo->sortBy(function($ordenar){
      return $ordenar->created_at;
    });
    $articulo=Articulo::findOrFail($id);
    //  dd($articulo->nombre);
    return view("almacen.articulo.show", compact('todo2','articulo'));
  }
  public function update(Request $request, $id)
  {

      if ( $request->precio_venta == null  and $request->precio_compra == null )
      {
          toastr()->error('Tiene que llenar precio venta o precio compra!', 'ATENCIÓN');
      }
      else
      {
          $detall = DetalleIngreso::where('idarticulo', $id)->orderBy('iddetalle_ingreso', 'desc')->first();

          if ($detall == null)
          {
              toastr()->error('No existe ningun INGRESO del producto '.$request->nombre.' por lo tanto no tiene precio', 'Atención');
          }
          else
          {
              $detalle = DetalleIngreso::where('idarticulo', $id)->orderBy('iddetalle_ingreso', 'desc')->first();
              $det = DetalleIngreso::find($detalle->iddetalle_ingreso);
              if ($request->precio_compra != null)
              {
                  $det->precio_compra = $request->precio_compra;
              }
              if ($request->precio_venta != null)
              {
                  $det->precio_venta = $request->precio_venta;
              }
              $det->save();

              toastr()->success('El precio del producto '.$request->nombre.' se ha cambiado correctamente', 'ATENCIÓN');

          }

      }


      $articulo=Articulo::find($id);
      $articulo->idcategoria=$request->idcategoria;
      if ($request->codigo == '' || $request->codigo == null) {
          srand((double) microtime( )*1000000);  //Introducimos la "semilla"
          $aleat = rand(1,999999999999);    //rand(mínimo,máximo);
          $articulo->codigo=$aleat;
      }else {
          $articulo->codigo=$request->codigo;
      }
      $articulo->nombre=$request->nombre;
      $articulo->stock= $request->stock;
      $articulo->descripcion=$request->descripcion;
      if ($request->file('imagen')) {
          $file= $request->file('imagen');
          $file->move(public_path().'/imagenes/articulos/', stripAccents($file->getClientOriginalName()));
          $articulo->imagen=$file->getClientOriginalName();
      }
      $articulo->save();

      toastr()->info('Su artículo se ha editado correctamente!', ''.$request->nombre);

      return Redirect::back();


  }
  public function destroy($id)
    {
        $articulo=Articulo::find($id);
        $articulo->estado='Inactivo';
        $articulo->update();

        toastr()->error('Su artículo se ha borrado correctamente!', ''.$articulo->nombre);

        return Redirect::back();
    }

}
