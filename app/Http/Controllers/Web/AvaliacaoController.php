<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Redirect;
use  Illuminate\Support\Facades\Auth;

use App\Models\Avaliacao;
use App\Repositories\AvaliacaoRepository;

class AvaliacaoController extends Controller
{
    public function __construct(Avaliacao $avaliacao){
        $this->avaliacao = $avaliacao;
        $this->avaliacaoRepository = new AvaliacaoRepository($this->avaliacao);
    }

    public function store(Request $request){
        $request->merge(['user_id' =>  Auth::user()->id]);
        $this->avaliacaoRepository->store($request);
        return Redirect::back();
    }

}
