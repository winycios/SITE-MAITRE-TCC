<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Prato;
use App\Models\Restaurante;

use Illuminate\Support\Facades\Storage;

class PratoController extends Controller
{
  
    public function index()
    {
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;
        $pratos = Prato::select('pratos.id', 'pratos.nome', 'pratos.foto', 'pratos.descPrato', 'pratos.valor','categorias.descCategoria')->join('categorias', 'categorias.id', 'pratos.categoria_id')->where('restaurante_id', $id)->get();
        return view('dashboards.restaurante.cardapio', ['pratos' => $pratos, 'categorias' => Categoria::all()]);
    }

   
    public function create()
    {
        
        return $this->index();
    }

  
    public function store(Request $request)
    {
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;

        $imagem = $request->file('foto');
        // $path = Storage::disk('s3')->put('imagens', $imagem, 'public');
        // Storage::disk('s3')->setVisibility($path, 'public');

        $name = $imagem->getClientOriginalName(); 
        $path = $imagem->storeAs('imagens', $name, 'public');

        Prato::create([
            'nome' => $request->nome,
            'descPrato' => $request->descPrato,
            'valor' => $request->valor,
            // "foto" => Storage::disk('s3')->url($path),
            "foto" => $path,
            'categoria_id' => $request->categoria_id,
            'restaurante_id' => $id,
        ]);
        return $this->index();
    }


}
