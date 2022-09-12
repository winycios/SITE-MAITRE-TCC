<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Prato;

class PratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Prato::all();
    }

    public function store(Request $request)
    {
        $imagem = $request->file('foto');
        $path = Storage::disk('s3')->put('imagens', $imagem, 'public');
        Storage::disk('s3')->setVisibility($path, 'public');
        return Prato::create([
            'nome' => $request->nome,
            'descPrato' => $request->descPrato,
            'valor' => $request->valor,
            "foto" => Storage::disk('s3')->url($path),
            'categoria_id' => $request->categoria_id,
            'restaurante_id' => $request->restaurante_id,
        ]);
    }

    public function show($id)
    {
        return Prato::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $prato =  Prato::findOrFail($id);
        $prato->update($request->only('nome','foto','descPrato','valor', 'categoria_id'));
        return $prato;
    }

  
    public function destroy($id)
    {
        return Prato::findOrFail($id)->delete();
    }
}
