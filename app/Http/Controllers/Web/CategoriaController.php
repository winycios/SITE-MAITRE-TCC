<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Categoria;

use App\Models\Prato;

use App\Repositories\CategoriaRepository;

use DB;

class CategoriaController extends Controller
{

    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
        $this->categoriaRepository = new CategoriaRepository($this->categoria);
    }

    public function index_response(){
        $categorias = $this->categoria->all();
        $count = DB::table('categorias')->count();
        return view('dashboards.admin.categoria.create', ['categorias' => $categorias, 'count' => $count]);
    }

    public function create(){
        return $this->index_response();
    }

    public function store(Request $request){
        $this->categoriaRepository->store($request);
        $level = \Auth::user()->level;
        if($level == 2){
            return view('dashboards.restaurante.cardapio', ['pratos' => Prato::all(),'categorias' => Categoria::all()]);
        }else{
            return $this->index_response();
        }
       

        //return $this->index_response();
    }
    public function destroy($id){
        $this->categoriaRepository->destroy($id);
        return $this->index_response();
    }
}
