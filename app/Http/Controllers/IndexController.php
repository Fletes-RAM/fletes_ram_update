<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function show()
    {
        $unidades_list = DB::table('unidades_list')->orderBy('unidad')->pluck('unidad', 'id');
        $opes = Operador::all();
        // ->with('gasolineras_list', Gasolinera::orderBy('gasolinera')->lists('gasolinera', 'id'))
        // ->with('asignaciones', Asignacion::where('user_id', 1)->where('terminado', '!=', 'Ruta Finalizada')->get())
        // ->with('cotizaciones', Cotizacion::all()->sortByDesc('created_at'))
        // ->with('unidades', Unidad::orderBy('vigencia')->limit(5)->get())
        // ->with('ops', Operador::where('vigencia', '!=', '0000-00-00')->orderBy('vigencia')->limit(5)->get())
        // ->with('medica', Operador::where('medica', '!=', '0000-00-00')->orderBy('medica')->limit(5)->get())
        // ->with('clientes', Cliente::orderBy('cliente')->get())
        return view('dashboard', compact(
            'unidades_list','opes',
        ));
    }
}


