<?php

namespace App\Http\Controllers\Api;

use App\Models\Horario;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function __construct(Horario $horario){
        $this->horario = $horario;
    }

    public function  index(){
        return Horario::all();
    }


    public function store(Request $request){  
        //$request->validate($this->horario->rules(), $this->horario->feedback());
        //dd($request);
        $horario = $this->horario->create([
            "dia_semana_id" => $request->dia_semana_id,
            "horario" => $request->horario,
            "restaurante_id" => $request->restaurante_id,
        ]);

        return response()->json(['horario' => $horario], 200);

        //return $request;
    }

    public function show($id){
        return response()->json(['horarios' => $this->horario->where('dia_semana_id', $id)->get()]);
    }

    public function teste($id, $dia){
        


        return response()->json(['horarios' => $this->horario->where('dia_semana_id', $dia)->where('restaurante_id', $id)->get()]);
    }

    public function destroy($id){
        return response($this->horario->where('id', $id)->delete());
    }

    public function forceDelete($id){
        return response($this->horario->where('id', $id)->forceDelete());
        
    }

    public function restore($id){
        return response($this->horario->where('id', $id)->withTrashed()->restore());
    }
}
