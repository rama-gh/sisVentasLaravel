<?php

namespace SisVentaNew\Http\Controllers;

use SisVentaNew\Role;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SisVentaNew\Config;
use DB;
use View;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
      $config=DB::table('config')
                  ->first();
  
        View::share('config', $config);
    }

}