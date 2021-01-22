<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Collection;

use SisVentaNew\Http\Requests\EstimacionRequest;

use SisVentaNew\Estimacion;

use SisVentaNew\DetalleEstimacion;

use SisVentaNew\Venta;

use SisVentaNew\DetalleVenta;

use SisVentaNew\Presupuesto;

use SisVentaNew\Categoria;

use SisVentaNew\Persona;

use SisVentaNew\DetallePresupuesto;

use DB;

use Carbon\Carbon;

use Response;

use GameSettingsTrait;

class EstimacionController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index(Request $request)
  {

    if ($request)
    {
      $query=trim($request->get('searchText'));
      $estimacion=DB::table('estimacion as e')
      ->join('detalle_estimacion as de','e.idestimacion','=','de.idestimacion')
      ->select('e.idestimacion','e.fecha_hora','e.impuesto','e.estado','e.total_venta')
      ->where('e.fecha_hora','LIKE','%'.$query.'%')
      ->orderBy('e.idestimacion','desc')
      ->groupBy('e.idestimacion','e.fecha_hora','e.impuesto','e.estado','e.total_venta')
      ->paginate(7);
      return view('almacen.estimacion.index',["estimacion"=>$estimacion,"searchText"=>$query]);

    }
  }
  public function create()
  {
    $articulos = DB::table('articulo as art')
    ->join('detalle_ingreso as di', 'art.idarticulo', '=', 'di.idarticulo' )
    ->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.idarticulo','art.imagen','art.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
    ->where('art.estado','=','Activo')
    ->where('art.stock','>','0')
    ->groupBy('articulo','art.idarticulo','art.stock','art.imagen')
    ->get();
    //  dd($articulos);
    return view("almacen.estimacion.create",["articulos"=>$articulos]);
  }

  public function store (EstimacionRequest $request)
  {
    // dd($request);

    DB::beginTransaction();
    $estimacion=new Estimacion;
    $estimacion->total_venta=$request->get('total_venta');
    $estimacion->idusuario=$request->get('idusuario');

    $mytime = Carbon::now('America/Argentina/Mendoza');
    $estimacion->fecha_hora=$mytime->toDateTimeString();
    $estimacion->impuesto='18';
    $estimacion->estado='Venta Sin Realizar';
    $estimacion->save();

    $idarticulo = $request->get('idarticulo');
    $cantidad = $request->get('cantidad');
    $descuento = $request->get('descuento');
    $precio_venta = $request->get('precio_venta');

    $cont = 0;

    while($cont < count($idarticulo)){
      $detalle = new DetalleEstimacion();
      $detalle->idestimacion= $estimacion->idestimacion;
      $detalle->idarticulo= $idarticulo[$cont];
      $detalle->cantidad= $cantidad[$cont];
      $detalle->descuento= $descuento[$cont];
      $detalle->precio_venta= $precio_venta[$cont];
      $detalle->save();
      $cont=$cont+1;
    }
    DB::commit();
    $usuario=DB::table('users')
    ->where('id','=',$estimacion->idusuario)
    ->first();

    flash('Su presupuesto fue registrado por el usuario '.$usuario->name.' correctamente')->success()->important();

    return Redirect::to('almacen/estimacion');

  }

  public function show($id)
  {
    $estimacion=DB::table('estimacion as e')
    ->join('detalle_estimacion as de','e.idestimacion','=','de.idestimacion')
    ->select('e.idestimacion','e.fecha_hora','e.impuesto','e.estado','e.total_venta','e.idusuario')
    ->groupBy('e.idestimacion','e.fecha_hora','e.impuesto','e.estado','e.total_venta','e.idusuario')
    ->where('e.idestimacion','=',$id)
    ->first();
    //dd($estimacion);
    $detalles=DB::table('detalle_estimacion as d')
    ->join('articulo as a','d.idarticulo','=','a.idarticulo')
    ->select('a.nombre as articulo','d.created_at','d.cantidad','d.descuento','d.precio_venta')
    ->where('d.idestimacion','=',$id)
    ->get();
    // dd($detalles);
    $usuario=DB::table('users')
    ->where('id','=',$estimacion->idusuario)
    ->first();
    return view("almacen.estimacion.show",["estimacion"=>$estimacion,"detalles"=>$detalles,"usuario"=>$usuario]);

  }

  public function estimacionventa($id)
  {

    $personas=DB::table('persona')
    ->where('tipo_persona','=','Cliente')
    ->OrWhere('tipo_persona','=','Cliente Cuenta Corriente')
    ->get();
    // dd($personas);
    $estimacion=DB::table('estimacion as e')
    ->join('detalle_estimacion as de','e.idestimacion','=','de.idestimacion')
    ->select('e.idestimacion','e.fecha_hora','e.impuesto','e.estado','e.total_venta','e.idusuario')
    ->groupBy('e.idestimacion','e.fecha_hora','e.impuesto','e.estado','e.total_venta','e.idusuario')
    ->where('e.idestimacion','=',$id)
    ->first();
    //dd($estimacion);
    $detalles=DB::table('detalle_estimacion as d')
    ->join('articulo as a','d.idarticulo','=','a.idarticulo')
    ->select('a.idarticulo','a.nombre as articulo','d.created_at','d.cantidad','d.descuento','d.precio_venta')
    ->where('d.idestimacion','=',$id)
    ->get();
    $ven= Venta::all()->last();
		if ($ven==null)
    {
			$ven='1';
     return view("almacen.estimacion.estimacionventa",["estimacion"=>$estimacion,"detalles"=>$detalles,"personas"=>$personas,"ven"=>$ven]);
    }
    else {
      return view("almacen.estimacion.estimacionventa",["estimacion"=>$estimacion,"detalles"=>$detalles,"personas"=>$personas,"ven"=>$ven]);
    }
  }

  public function crearventa(Request $request)
  {

    $esti=DB::table('estimacion')
    ->where('idestimacion','=',$request->idestimacion)
    ->first();
    // dd($esti->estado);

    if ($esti->estado == "Venta Sin Realizar") {
      $estimacion=DB::table('estimacion as e')
      ->join('detalle_estimacion as de','e.idestimacion','=','de.idestimacion')
      ->select('e.idestimacion','e.fecha_hora','e.impuesto','e.estado','e.total_venta','e.idusuario')
      ->groupBy('e.idestimacion','e.fecha_hora','e.impuesto','e.estado','e.total_venta','e.idusuario')
      ->where('e.idestimacion','=',$request->idestimacion)
      ->first();

      $detalles=DB::table('detalle_estimacion as d')
      ->join('articulo as a','d.idarticulo','=','a.idarticulo')
      ->select('a.idarticulo','a.nombre as articulo','d.created_at','d.cantidad','d.descuento','d.precio_venta','iddetalle_estimacion')
      ->where('d.idestimacion','=',$request->idestimacion)
      ->get();


      $fecha= DB::table('venta as v')
      ->orderBy('idventa','desc')
      ->first();
      $mytime = Carbon::now('America/Argentina/Mendoza');
      $ventaact=$mytime->toDateString();

      $ultimoid= DB::table('presupuesto')
      ->orderBy('idpresupuesto','desc')
      ->first();
      $ultimodetalle= DB::table('detalle_presupuesto')
      ->orderBy('idpresupuesto','desc')
      ->first();

      foreach ($detalles as $detalle){
        $arti[] = $detalle->idarticulo;
        $cant[] = $detalle->cantidad;
        $desc[] = $detalle->descuento;
        $pre[] = $detalle->precio_venta;
      }
      // $fe = "";
        //  dd(isset($fecha->fecha_hora));

      if (Presupuesto::exists() && isset($fecha->fecha_hora) == true) {
          // dd(isset($fecha->fecha_hora));
        if ( $ventaact == $fecha->fecha_hora) {
          $totalpro = $ultimoid->total_venta + $estimacion->total_venta;
          $venta=Presupuesto::findOrFail($ultimoid->idpresupuesto);
          $venta->total_venta=$totalpro;
          $venta->update();

          $idarticulo = $arti;
          $cantidad = $cant;
          $descuento = $desc;
          $precio_venta = $pre;
          $cont = 0;

          while($cont < count($idarticulo)){
            $detalle = new DetallePresupuesto();
            $detalle->idpresupuesto= $ultimoid->idpresupuesto;
            $detalle->idarticulo= $idarticulo[$cont];
            $detalle->cantidad= $cantidad[$cont];
            $detalle->descuento= $descuento[$cont];
            $detalle->precio_venta= $precio_venta[$cont];
            $detalle->save();
            $cont=$cont+1;
          }

        }
        else {

          DB::beginTransaction();
          $presupuesto=new Presupuesto;
          $presupuesto->idcliente=$request->get('idcliente');
          $presupuesto->tipo_comprobante=$request->get('tipo_comprobante');
          $presupuesto->num_comprobante=$request->get('num_comprobante');
          $presupuesto->total_venta= $estimacion->total_venta;
          $presupuesto->idusuario=$request->get('idusuario');

          $mytime = Carbon::now('America/Argentina/Mendoza');
          $presupuesto->fecha_hora=$mytime->toDateTimeString();
          $presupuesto->impuesto='18';
          $presupuesto->estado='Sin Revisar';
          $presupuesto->save();


          $idarticulo = $arti;
          $cantidad = $cant;
          $descuento = $desc;
          $precio_venta = $pre;

          $cont = 0;

          while($cont < count($idarticulo)){
            $detalle = new DetallePresupuesto();
            $detalle->idpresupuesto= $presupuesto->idpresupuesto;
            $detalle->idarticulo= $idarticulo[$cont];
            $detalle->cantidad= $cantidad[$cont];
            $detalle->descuento= $descuento[$cont];
            $detalle->precio_venta= $precio_venta[$cont];
            $detalle->save();
            $cont=$cont+1;
          }
          DB::commit();
        }
      }
      else {

        DB::beginTransaction();
        $presupuesto=new Presupuesto;
        $presupuesto->idcliente=$request->get('idcliente');
        $presupuesto->tipo_comprobante=$request->get('tipo_comprobante');
        $presupuesto->num_comprobante=$request->get('num_comprobante');
        $presupuesto->total_venta= $estimacion->total_venta;
        $presupuesto->idusuario=$request->get('idusuario');

        $mytime = Carbon::now('America/Argentina/Mendoza');
        $presupuesto->fecha_hora=$mytime->toDateTimeString();
        $presupuesto->impuesto='18';
        $presupuesto->estado='Sin Revisar';
        $presupuesto->save();

        $idarticulo = $arti;
        $cantidad = $cant;
        $descuento = $desc;
        $precio_venta = $pre;

        $cont = 0;

        while($cont < count($idarticulo)){
          $detalle = new DetallePresupuesto();
          $detalle->idpresupuesto= $presupuesto->idpresupuesto;
          $detalle->idarticulo= $idarticulo[$cont];
          $detalle->cantidad= $cantidad[$cont];
          $detalle->descuento= $descuento[$cont];
          $detalle->precio_venta= $precio_venta[$cont];
          $detalle->save();
          $cont=$cont+1;
        }
        DB::commit();

      }

      DB::beginTransaction();
      $venta=new Venta;
      $venta->idcliente=$request->get('idcliente');
      $venta->tipo_comprobante=$request->get('tipo_comprobante');
      $venta->num_comprobante=$request->get('num_comprobante');
      $venta->total_venta=$estimacion->total_venta;
      $venta->idusuario=$request->get('idusuario');
      $venta->paga=$request->get('paga');

      $mytime = Carbon::now('America/Argentina/Mendoza');
      $venta->fecha_hora=$mytime->toDateTimeString();
      $venta->impuesto='18';
      $venta->estado='Sin Revisar';
      $venta->save();

      $idarticulo = $arti;
      $cantidad = $cant;
      $descuento = $desc;
      $precio_venta = $pre;

      $cont = 0;

      while($cont < count($idarticulo)){
        $detalle = new DetalleVenta();
        $detalle->idventa= $venta->idventa;
        $detalle->idarticulo= $idarticulo[$cont];
        $detalle->cantidad= $cantidad[$cont];
        $detalle->descuento= $descuento[$cont];
        $detalle->precio_venta= $precio_venta[$cont];
        $detalle->save();
        $cont=$cont+1;
      }
      DB::commit();

      $venta=Estimacion::findOrFail($request->idestimacion);
      $venta->estado='Venta Realizada';
      $venta->update();
      flash('Su venta fue registrada correctamente')->important();
      return Redirect::to('ventas/venta');

    }
    else {
      flash('Su venta ya fue registrada, si decea, haga un nuevo presupuesto y realize una nueva venta. O Cree una nueva venta.')->warning()->important();

      return Redirect::to('almacen/estimacion');
    }

  }
}
