<?php

namespace App\Http\Controllers\Api;

use App\Models\Categoria;
use Illuminate\Http\Request;

use App\Repositories\CategoriaRepository;

class CategoriaController extends Controller
{

    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
        $this->categoriaRepository = new CategoriaRepository($this->categoria);
    }
    public function index(){
        return $this->categoria->all();
    }

    public function show($id){
        return response($this->categoria->findOrFail($id), 200);
    }

    public function store(Request $request){

        return response($this->categoriaRepository->store($request), 201);

    }

    public function update(Request $request, $id){
        
        return response($this->categoriaRepository->update($request, $id), 202);
    }

    public function destroy($id){
        $this->categoriaRepository->destroy($id);
        return response('categoria excluida com sucesso', 200);
    }





}
