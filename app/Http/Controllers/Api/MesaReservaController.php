<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reserva;
use App\Models\Horario;

use App\Models\Mesas;
use App\Models\MesaReserva;


class MesaReservaController extends Controller
{
    public function index(){
        return MesaReserva::all();
    }

    public function store(Request $request){
        $mesa = MesaReserva::create([
            "mesa_id" => $request->mesa_id,
            "reserva_id" => $request->reserva_id,
        ]);

        $r = Reserva::findOrFail($request->reserva_id);
        $r->duracao = $request->duracao;
        $r->save();

        $h = Horario::where('restaurante_id', $r->restaurante_id)
        ->where('horario', $r->horario)
        ->where('dia_semana_id', $r->diaSemana)
        ->first();
        $h->delete();
        $h->save();

        $m = Mesas::findOrFail( $request->mesa_id);
        $m->disponivel = 0;
        $m->save();
        return response()->json(['mesas' => $mesa], 201);
    }
}
