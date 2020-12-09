<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $year=date('Y');
        $ingresos=DB::table('ingresos')
        ->select(
            DB::raw('extract (month from ingresos.fecha_hora) as mes'),
            DB::raw('extract (year from ingresos.fecha_hora) as anio'),
            DB::raw('SUM(ingresos.total) as total')
        )
        ->whereYear('ingresos.fecha_hora',$year)
        ->groupBy(
           DB::raw('ingresos.fecha_hora'),
            DB::raw('ingresos.fecha_hora')
        )
        ->get();


        $ventas=DB::table('ventas')
        ->select(
            DB::raw('extract (month from ventas.fecha_hora) as mes'),
            DB::raw('extract (year from ventas.fecha_hora) as anio'),
            DB::raw('SUM(ventas.total) as total')
        )
        ->whereYear('ventas.fecha_hora',$year)
        ->groupBy(
            DB::raw('ventas.fecha_hora'),
            DB::raw('ventas.fecha_hora')
        )
        ->get();

        return ['ingresos'=>$ingresos,'ventas'=>$ventas,'anio'=>$year];

    }
}
