<?php


namespace App\Repositories;
use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;

class CategoriaRepository{

    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
    }

    public function store(Request $request){
        $request->validate($this->categoria->rules(), $this->categoria->feedback());

        return $this->categoria->create([
            "descCategoria" => $request->descCategoria

        ]);

    }

    public function update(Request $request, $id){
        $this->categoria = $this->categoria->findOrFail($id);

        $request->validate($this->categoria->rules(), $this->categoria->feedback());


        $this->categoria->update([
            "descCategoria" => $request->descCategoria

        ]);

        return $this->categoria;
    }

    public function destroy($id){
        $this->categoria = $this->categoria->findOrFail($id);

        $this->categoria->destroy($id);

    }

}
