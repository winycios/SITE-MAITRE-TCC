<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Horario;
use App\Models\Restaurante;

class HorarioController extends Controller
{

    public function __construct(Horario $horario){
        $this->horario = $horario;
    }

    public function create(){
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;

        $horarios=$this->horario->select('horarios.id', 'horarios.horario', 'dia_semanas.diaSemana', 'horarios.deleted_at')->join('dia_semanas', 'dia_semanas.id', 'horarios.dia_semana_id')->withTrashed()->where('horarios.restaurante_id', $id)->get();
        //$horarios = $this->horario->join('dia_semanas', 'dia_semanas.id', 'horarios.dia_semana_id')->where('restaurante_id', $id)->get();
        //dd($horarios);
        return view('dashboards.restaurante.horarios', ['horarios' => $horarios, 'rest_id' => $id]);
    }

    public function store(Request $request){
        $request->validate($this->horario->rules(), $this->horario->feedback());

        $id = $request->restaurante_id;

        $this->horario->create([
            "dia_semana_id" => $request->dia_semana_id,
            "horario" => $request->horario,
            "restaurante_id" => $id,
        ]);

        $horarios=$this->horario->select('horarios.id', 'horarios.horario', 'dia_semanas.diaSemana', 'horarios.deleted_at')->join('dia_semanas', 'dia_semanas.id', 'horarios.dia_semana_id')->withTrashed()->where('horarios.restaurante_id', $id)->get();
       

        return view('dashboards.restaurante.horarios', ['horarios' => $horarios, 'rest_id' => $id]);

    }
}
