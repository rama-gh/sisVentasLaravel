<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use SisVentaNew\Http\Requests\PresupuestoFormRequest;

use SisVentaNew\Presupuesto;

use SisVentaNew\DetallePresupuesto;

use DB;

use Carbon\Carbon;

use Response;

use Illuminate\Support\Collection;

class PresupuestoController extends Controller
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
					 $presupuesto=DB::table('presupuesto as pr')
						->join('persona as p','pr.idcliente','=','p.idpersona')
						->join('detalle_presupuesto as dp','pr.idpresupuesto','=','dp.idpresupuesto')
						->select('pr.idpresupuesto','pr.fecha_hora','p.nombre','pr.tipo_comprobante','pr.num_comprobante','pr.impuesto','pr.estado','pr.total_venta')
						->where('pr.fecha_hora','LIKE','%'.$query.'%')
						->orderBy('pr.idpresupuesto','desc')
						->groupBy('pr.idpresupuesto','pr.fecha_hora','p.nombre','pr.tipo_comprobante','pr.num_comprobante','pr.impuesto','pr.estado', 'pr.total_venta')
						->paginate(7);
						return view('almacen.presupuesto.index',["presupuesto"=>$presupuesto,"searchText"=>$query]);

				}

		}
		public function create()
		{
		 $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
		 $articulos = DB::table('articulo as art')
				->join('detalle_ingreso as di', 'art.idarticulo', '=', 'di.idarticulo' )
						->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.idarticulo', 'art.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
						->where('art.estado','=','Activo')
						->where('art.stock','>','0')
						->groupBy('articulo','art.idarticulo','art.stock')
						->get();
				return view("almacen.presupuesto.create",["personas"=>$personas,"articulos"=>$articulos]);
		}

		 public function store (PresupuestoFormRequest $request)
		{
				//dd($request->get('idarticulo'));

				$fecha= DB::table('presupuesto')
										->select('presupuesto.fecha_hora')
										->orderBy('idpresupuesto','desc')
										->first();
				$mytime = Carbon::now('America/Argentina/Mendoza');
	 			$ventaact=$mytime->toDateString();

				$ultimoid= DB::table('presupuesto')
										->orderBy('idpresupuesto','desc')
										->first();
				$ultimodetalle= DB::table('detalle_presupuesto')
										->orderBy('idpresupuesto','desc')
										->first();
				//dd($request->get('total_venta'));
				//dd($totalpro);
		if (Presupuesto::exists()) {
				if ($ventaact == $fecha->fecha_hora) {
					 $totalpro = $ultimoid->total_venta + $request->get('total_venta');
					 $venta=Presupuesto::findOrFail($ultimoid->idpresupuesto);
					 $venta->tipo_comprobante='recaudacion';
					 $venta->num_comprobante=000;
					 $venta->total_venta=$totalpro;
					 $venta->update();

					$idarticulo = $request->get('idarticulo');
 					$cantidad = $request->get('cantidad');
 					$descuento = $request->get('descuento');
 					$precio_venta = $request->get('precio_venta');

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

				}else {
					DB::beginTransaction();
					$venta=new Presupuesto;
					$venta->idcliente=1;
					$venta->tipo_comprobante='Recaudación';
					$venta->num_comprobante=000;
					$venta->total_venta=$request->get('total_venta');
					$venta->idusuario=$request->get('idusuario');

					$mytime = Carbon::now('America/Argentina/Mendoza');
					$venta->fecha_hora=$mytime->toDateString();
					$venta->impuesto='18';
					$venta->estado='Sin Revisar';
					$venta->save();

					$idarticulo = $request->get('idarticulo');
					$cantidad = $request->get('cantidad');
					$descuento = $request->get('descuento');
					$precio_venta = $request->get('precio_venta');

					$cont = 0;

					while($cont < count($idarticulo)){
							$detalle = new DetallePresupuesto();
							$detalle->idpresupuesto= $venta->idpresupuesto;
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
				$venta=new Presupuesto;
				$venta->idcliente=$request->get('idcliente');
				$venta->tipo_comprobante='recaudacion';
				$venta->num_comprobante=000;
				$venta->total_venta=$request->get('total_venta');
				$venta->idusuario=$request->get('idusuario');

				$mytime = Carbon::now('America/Argentina/Mendoza');
				$venta->fecha_hora=$mytime->toDateString();
				$venta->impuesto='18';
				$venta->estado='Sin Revisar';
				$venta->save();

				$idarticulo = $request->get('idarticulo');
				$cantidad = $request->get('cantidad');
				$descuento = $request->get('descuento');
				$precio_venta = $request->get('precio_venta');

				$cont = 0;

				while($cont < count($idarticulo)){
						$detalle = new DetallePresupuesto();
						$detalle->idpresupuesto= $venta->idpresupuesto;
						$detalle->idarticulo= $idarticulo[$cont];
						$detalle->cantidad= $cantidad[$cont];
						$detalle->descuento= $descuento[$cont];
						$detalle->precio_venta= $precio_venta[$cont];
						$detalle->save();
						$cont=$cont+1;
				}
				DB::commit();
			}
				return Redirect::to('almacen/presupuesto');
		}

		public function show($id)
		{
		 $venta=DB::table('presupuesto as v')
						->join('persona as p','v.idcliente','=','p.idpersona')
						->join('detalle_presupuesto as dv','v.idpresupuesto','=','dv.idpresupuesto')
						->select('v.idpresupuesto','v.fecha_hora','p.nombre','v.tipo_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','idusuario')
						->groupBy('v.idpresupuesto','v.fecha_hora','p.nombre','v.tipo_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','idusuario')
						->where('v.idpresupuesto','=',$id)
						->first();
				$detalles=DB::table('detalle_presupuesto as d')
						 ->join('articulo as a','d.idarticulo','=','a.idarticulo')
						 ->select('a.nombre as articulo','d.created_at','d.cantidad','d.descuento','d.precio_venta')
						 ->where('d.idpresupuesto','=',$id)
						 ->orderBy('created_at', 'asc')
						 ->get();
				$usuario=DB::table('users')
										->where('id','=',$venta->idusuario)
										->first();
		//		dd($usuario);
				return view("almacen.presupuesto.show",["venta"=>$venta,"detalles"=>$detalles,"usuario"=>$usuario]);

		}

		public function destroy($id)
		{
			 $fecha = DB::table('presupuesto')
			 					->where('idpresupuesto','=',$id)
								->first();

			 $venta=Presupuesto::findOrFail($id);
			 $venta->estado='Revisado';
			 $venta->update();

			 flash('Su recaudación del dia '.date("d-m-Y", strtotime($fecha->fecha_hora)).', fue dada como revisada ')->important();

				return Redirect::to('almacen/presupuesto');
		}

}
