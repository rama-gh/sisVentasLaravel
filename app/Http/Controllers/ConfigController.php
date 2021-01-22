<?php

namespace SisVentaNew\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Schema;
use SisVentaNew\Http\Requests\ArticuloFormRequest;

use SisVentaNew\Config;

use DB;

use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{
      public function __construct()
      {
        parent::__construct();
      }
     public function index()
     {
       $config=DB::table('config')
                   ->first();
       return view('config.index',['config'=>$config]);
     }

     public function create(Request $request)
     {
      //  dd($request);

       function stripAccents($string){
         return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝñÑ',
         'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUYnN');
         }

       $config= new Config;
         $config->nombre=$request->get('nombre');
         $config->lema=$request->get('lema');
         $config->dni=$request->get('dni');
         $config->telefono=$request->get('telefono');
         $config->correo=$request->get('correo');
         $config->campo2=$request->get('pagina');
         $config->impuesto=$request->get('impuesto');
         $config->direccion=$request->get('direccion');
         $config->alert_minima=7;
         $config->alert_maxima=7;
         $config->estadistica_diaz=7;
         $config->pro_vendidos=7;
         $config->pro_recaudacion=7;
         $config->menu_mini=$request->get('menu_mini');
         $config->articulo_paginate = 7;
         $config->articulo_orden =7;
         $config->categoria_paginate = 7;
         $config->categoria_orden = 7;
         $config->cliente_paginate = 7;
         $config->cliente_orden =7;
         $config->proveedores_paginate = 7;
         $config->proveedores_orden = 7;
         $config->usuario_paginate = 7;
         $config->usuario_orden = 7;
         $config->campo1=$request->get('campo1');
         if ($request->file('imagen')) {
             $file= $request->file('imagen');
             $file->move(public_path().'/imagenes/config/', $file->getClientOriginalName());
             $config->imagen=$file->getClientOriginalName();
         }
         $config->update();
       $config->save();
       $config=DB::table('config')->first();
       return view('config.index',['config'=>$config]);
     }

     public function edit($id)
     {
         return view("config.edit", ["config" => Config::findOrFail($id)]);
     }
     public function update(Request $request, $id)
     {
        // dd($request);
         $config=Config::findOrFail($id);
         $config->nombre=$request->get('nombre');
         $config->lema=$request->get('lema');
         $config->dni=$request->get('dni');
         $config->telefono=$request->get('telefono');
         $config->correo=$request->get('correo');
         $config->campo2=$request->get('pagina');
         $config->impuesto=$request->get('impuesto');
         $config->direccion=$request->get('direccion');
         $config->alert_minima=7;
         $config->alert_maxima=7;
         $config->estadistica_diaz=7;
         $config->pro_vendidos=7;
         $config->pro_recaudacion=7;
         $config->menu_mini=$request->get('menu_mini');
         $config->articulo_paginate = 7;
         $config->articulo_orden =7;
         $config->categoria_paginate = 7;
         $config->categoria_orden = 7;
         $config->cliente_paginate = 7;
         $config->cliente_orden =7;
         $config->proveedores_paginate = 7;
         $config->proveedores_orden = 7;
         $config->usuario_paginate = 7;
         $config->usuario_orden = 7;
         $config->campo1=$request->get('campo1');
         if ($request->file('imagen')) {
             $file= $request->file('imagen');
             $file->move(public_path().'/imagenes/config/', $file->getClientOriginalName());
             $config->imagen=$file->getClientOriginalName();
         }
         $config->update();
         toastr()->success('Configuración fue editada correcatamente!', 'Atención');
         return Redirect::back();
     }
    public function borrar()
    {

        Schema::dropIfExists('users');
        Schema::dropIfExists('ingreso');
        Schema::dropIfExists('persona');
        Schema::dropIfExists('articulo');
        Schema::dropIfExists('cuenta_corrientes');
        return '<h1>Clear</h1>';
    }



}
