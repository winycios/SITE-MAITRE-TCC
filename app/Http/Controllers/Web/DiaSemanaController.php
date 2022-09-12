<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DiaSemana;

class DiaSemanaController extends Controller
{
    public function index(){
        $dias = request('dias');

        

        if($dias){
            //dd($dias);
            return response(DiaSemana::select('id', 'diaSemana')->whereIn('id', $dias)->get());
        }else{
            return response()->json(['erro' => 'nenhum dado fornecido'], 304);
        }
    }
}
