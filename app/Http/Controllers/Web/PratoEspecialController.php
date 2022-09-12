<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PratoEspecial;
use App\Models\Restaurante;
use App\Models\Categoria;
use App\Models\DiaSemana;

class PratoEspecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;
        $pratos = PratoEspecial::select('pratos_especiais.id', 'pratos_especiais.nome', 'pratos_especiais.foto', 'pratos_especiais.descPrato', 'pratos_especiais.valor', 'categorias.descCategoria', 'dia_semanas.diaSemana')
        ->join('dia_semanas', 'dia_semanas.id', 'pratos_especiais.dia_semana_id')
        ->where('pratos_especiais.restaurante_id', $id)
        ->join('categorias', 'categorias.id', 'pratos_especiais.categoria_id')
        ->get();
    
        return view('dashboards.restaurante.especiais', ['pratos' => $pratos, 'categorias' => Categoria::all(), 'dias' => DiaSemana::all()]);
    }

    public function create()
    {
        return $this->index();
        //return view('dashboards.restaurante.especiais', ['pratos' => PratoEspecial::all(), 'categorias' => Categoria::all(), 'dias' => DiaSemana::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;

        $imagem = $request->file('foto');
        $name = $imagem->getClientOriginalName(); 
        $path = $imagem->storeAs('imagens', $name, 'public');
        // $path = Storage::disk('s3')->put('imagens', $imagem, 'public');
        // Storage::disk('s3')->setVisibility($path, 'public');

        PratoEspecial::create([
            "nome" => $request->nome,
            "descPrato" => $request->descPrato,
            "valor" => $request->valor,
            // "foto" => Storage::disk('s3')->url($path),
            "foto" => $path,
            'dia_semana_id' => $request->dia_semana_id,
            "categoria_id" => $request->categoria_id,
            "restaurante_id" => $id
        ]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
