<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Avaliacao;
use App\Repositories\AvaliacaoRepository;

class AvaliacaoController extends Controller
{
    public function __construct(Avaliacao $avaliacao){
        $this->avaliacao = $avaliacao;
        $this->avaliacaoRepository = new AvaliacaoRepository($this->avaliacao);
        
    }

    public function index(){
        return response()->json(['avaliacoes' => $this->avaliacaoRepository->index()], 200);
    }

    public function store(Request $request){
        return response($this->avaliacaoRepository->store($request), 201);

    }

    public function show($id){
        return response($this->avaliacaoRepository->show($id));
    }

    public function update(Request $request, $id){
        return response($this->avaliacaoRepository->update($request, $id));
    }

    public function destroy($id){
        return response($this->avaliacaoRepository->destroy($id));
    }
}
