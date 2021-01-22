<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
public function up()
    {
//          DB::unprepared('
//            CREATE TRIGGER tr_updStockIngreso AFTER INSERT ON detalle_ingreso
//            FOR EACH ROW BEGIN
//                    UPDATE articulo SET stock = stock + NEW.cantidad
//                    WHERE articulo.idarticulo = NEW.idarticulo;
//                END');
    }
    public function down()
    {
       DB::unprepared('DROP TRIGGER tr_updStockIngreso');
    }
}
