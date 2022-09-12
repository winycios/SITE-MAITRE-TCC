<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaRestaurante;

use DB;

class CategoriaRestauranteController extends Controller
{

    public  function index(){

        $categorias = CategoriaRestaurante::all();
        $count = DB::table('categoria_restaurantes')->count();

        return view('dashboards.admin.categoriaRestaurante', ['categorias' => $categorias, 'count' =>$count]);
    }

    public function store(Request $request){
        CategoriaRestaurante::create([
            'categoria' => $request->categoria,
        ]);

        return redirect('/admin/categorias/restaurantes/create');
    }

    public function update(Request $request){
        $c = CategoriaRestaurante::findOrFail($request->id);
        $c->update([
            'categoria' => $request->categoria,
        ]);

        return redirect('/admin/categorias/restaurantes/create');
    }

    public function destroy($id){
        CategoriaRestaurante::destroy($id);

        return redirect('/admin/categorias/restaurantes/create');
    }
}
