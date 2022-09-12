<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mesas;
use App\Models\Restaurante;

class MesaController extends Controller
{
   

    public function __construct(Mesas $mesa){
        $this->mesa = $mesa;
    }

    public function index()
    {
        return Mesas::all();
    }

    public function store(Request $request)
    {
        //$request->validate($this->mesa->rules($request->restaurante_id), $this->mesa->feedback());
        
        if(!Mesas::where('restaurante_id', $request->restaurante_id)->where('mesa', $request->mesa)->exists()){
            $mesa =Mesas::create([
                "mesa" => $request->mesa,
                "capacidade" => $request->capacidade,
                "disponivel" => $request->disponivel,
                "restaurante_id" => $request->restaurante_id,
            ]);
            return response()->json(['mesa' => $mesa], 200);
        }else{
            return response()->json(['error' => 'mesa ' .$request->mesa. ' já cadastrada'], 422);
        }
        
    }


    public function show($id)
    {
        return Mesas::findOrFail($id);
    }

    public function update(Request $request, $id){
       
        $rest = Restaurante::where('user_id', $request->id)->first();
        $restId = $rest->id;
        if(!Mesas::where('restaurante_id', $restId)->where('mesa', $request->mesa)->exists()){
            $mesa = Mesas::findOrFail($id);
            if($mesa->restaurante_id == $restId){
                $mesa->update($request->only('mesa', 'capacidade'));
                return $mesa;
            }else{
                return response()->json(['error' => 'você não pode atualizar uma mesa de outro restaurante '], 422);
            }
            
        }else{
            return response()->json(['error' => 'mesa ' .$request->mesa. ' já cadastrada'], 422);
        }
    }
        


  
    public function destroy($id)
    {
        //return Mesas::destroy($id);
        $m = Mesas::findOrFail($id);
        return $m->forceDelete();
    }

    public function restore($id){
        return response(Mesas::where('id', $id)->withTrashed()->restore());
    }

    public function inativar($id){
        $mesa = Mesas::findOrFail($id);
        
        $mesa->disponivel = 0;
        return $mesa->save();
    }

    public function reativar($id){
        $mesa = Mesas::findOrFail($id);
        
        $mesa->disponivel = 1;
        return $mesa->save();
    }
}
