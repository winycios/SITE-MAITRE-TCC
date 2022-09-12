<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mesas;
use App\Models\Restaurante;

class MesaController extends Controller
{

    public function index_response(){

        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;
        return view('dashboards.restaurante.mesas', ['mesas' => Mesas::where('restaurante_id', $id)->get()]);
    }

    public function create(){
        return $this->index_response();
    }
    public function store(Request $request){
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;
        if(!Mesas::where('restaurante_id', $id)->where('mesa', $request->mesa)->exists()){
            $mesa =Mesas::create([
                "mesa" => $request->mesa,
                "capacidade" => $request->capacidade,
                "disponivel" => $request->disponivel,
                "restaurante_id" => $id,
            ]);
            return $this->index_response();
        }else{
            return back();
        }
        
    }


    public function update(Request $request, $id){
        if(!Mesas::where('restaurante_id', $request->restaurante_id)->where('mesa', $request->mesa)->exists()){
            $mesa = Mesas::findOrFail($id);
            if($mesa->restaurante_id == $request->restaurante_id){
                $mesa->update($request->only('mesa', 'capacidade'));
                return $mesa;
            }else{
                return response()->json(['error' => 'você não pode atualizar uma mesa de outro restaurante '], 422);
            }
            
        }else{
            return response()->json(['error' => 'mesa ' .$request->mesa. ' já cadastrada'], 422);
        }
    }

    public function destroy($id){
        $m = Mesas::findOrFail($id);
        return $m->forceDelete();
    }

   
}
