<?php

namespace App\Http\Controllers;

use App\Models\Polizas;
use Illuminate\Http\Request;

class PolizasController extends Controller
{
    public function index()
    {
        $polizas = Polizas::get();
        return $polizas;
    }

    public function poliza($id)
    {
        $poliza = Polizas::find($id);
        return $poliza;
    }

    public function destroy($id)
    {
        $poliza = Polizas::find($id);
        $poliza->delete();
        return "Ok";
    }

    public function store(Request $request)
    {
        if($request->id != 0)
        {
            $poliza = Polizas::find($request->id);
        }
        else 
        {
            $poliza = new Polizas();
        }
        $poliza->total_horas = $request->total_horas;
        $poliza->fecha_inicio = $request->fecha_inicio;
        $poliza->fecha_fin = $request->fecha_fin;
        $poliza->precio = $request->precio;
        $poliza->id_cliente = $request->id_cliente;
        $poliza->observaciones = $request->observaciones;

        $poliza->save();

        return "Ok";
    }

    public function verificarRenovacion()
    {
        $polizas = Polizas::where('fecha_fin', '<=', now()->addDays(7))->get();

        return response()->json(['polizas' =>  $polizas]);
    }
}
