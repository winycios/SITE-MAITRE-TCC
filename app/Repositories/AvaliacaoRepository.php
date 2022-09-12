<?php


namespace App\Repositories;
use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model;

use App\Models\Avaliacao;

class AvaliacaoRepository{

    public function __construct(Avaliacao $avaliacao){
        $this->avaliacao = $avaliacao;
    }

    public function index(){
        return $this->avaliacao->all();
    }

    public function show($id){
        return $this->avaliacao->findOrFail($id);
    }

    public function store(Request $request){
        $request->validate($this->avaliacao->rules(), $this->avaliacao->feedback());

        return $this->avaliacao->create([
            "estrelas" => $request->estrelas,
            "descAvaliacao" => $request->descAvaliacao,
            "restaurante_id" => $request->restaurante_id,
            "user_id" => $request->user_id,
        ]);
    }

    public function update(Request $request, $id){
        $this->avaliacao = $this->avaliacao->findOrFail($id);
        $this->avaliacao->update($request->only('estrelas','descAvaliacao'));

        return $this->avaliacao;
    }

    public function destroy($id){
        return  $this->avaliacao->destroy($id);

    }

}