<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $anio=date('Y');
        $ingresos=DB::table('ingresos')
        ->select(
            DB::raw('MONTH(ingresos.fecha_hora) as mes'),
            DB::raw('YEAR(ingresos.fecha_hora) as anio'),
            DB::raw('SUM(ingresos.total) as total')
        )
        ->whereYear('ingresos.fecha_hora',$anio)
        ->groupBy(
            DB::raw('MONTH(ingresos.fecha_hora)'),
            DB::raw('YEAR(ingresos.fecha_hora)')
        )
        ->get();
 
        $ventas=DB::table('ventas')
        ->select(
            DB::raw('MONTH(ventas.fecha_hora) as mes'),
            DB::raw('YEAR(ventas.fecha_hora) as anio'),
            DB::raw('SUM(ventas.total) as total')
        )
        ->whereYear('ventas.fecha_hora',$anio)
        ->groupBy(
            DB::raw('MONTH(ventas.fecha_hora)'),
            DB::raw('YEAR(ventas.fecha_hora)')
        )
        ->get();
 
        return ['ingresos'=>$ingresos,'ventas'=>$ventas,'anio'=>$anio];      
 
    }
}
