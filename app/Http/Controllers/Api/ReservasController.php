<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;

use Carbon\Carbon;

class ReservasController extends Controller
{
    public function show($id){
        return  Reserva::findOrFail($id);
    }



    public function update(Request $request, $id){
        $r = Reserva::findOrFail($id);

        $r->status_reserva_id = $request->status_reserva_id;
        
        return $r->save();
    
    }

    public function checkin(Request $request, $id){
        $r = Reserva::findOrFail($id);

        $r->status_reserva_id = $request->status_reserva_id;
        $r->horaCheckIn = Carbon::now();
        return $r->save();
    
    }

    public function checkout(Request $request, $id){
        $r = Reserva::findOrFail($id);

        $r->status_reserva_id = $request->status_reserva_id;
        $r->horaCheckOut = Carbon::now();
        return $r->save();
    
    }

    public function destroy($id){
        $r = Reserva::findOrFail($id);
        $r->status_reserva_id = 4;
        return $r->save();
    }

    public function atualizar(Request $request, $id){
        $r = Reserva::findOrFail($id);

        $r->update($request->only('horario', 'data', 'qtdPessoas', 'diaSemana'));
    }
}