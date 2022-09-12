<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\CategoriaRestaurante;


class CategoriaRestauranteController extends Controller
{
    public function index(){
        return CategoriaRestaurante::all();
    }

    public function show($id){
        return CategoriaRestaurante::findOrFail($id);
    }


    public function store(Request $request){
        return CategoriaRestaurante::create([
            'categoria' => $request->categoria
        ]);
    }

    public function update(Request $request){
        return CategoriaRestaurante::update([
            'categoria' => $request->categoria,
        ]);

       
    }

    public function destroy($id){
       return  CategoriaRestaurante::destroy($id);   
    }
}
