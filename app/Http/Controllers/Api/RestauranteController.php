<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurante;
use App\Models\FotoRestaurante;
use Illuminate\Http\Request;

use App\Repositories\RestauranteRepository;



class RestauranteController extends Controller
{

    public function __construct(Restaurante $restaurante){
        $this->restaurante = $restaurante;
        $this->restauranteRepository = new RestauranteRepository($this->restaurante);
    }

    public function index(){
        return response()->json(["restaurantes" => $this->restauranteRepository->standard()], 200);
        //return response()->json(["restaurantes" => Restaurante::all()]);
    }

    public function show($id){
        //$restaurante = Restaurante::findOrFail($id);
        return response()->json(["restaurante" => $this->restauranteRepository->show($id)], 200);
    }

    public function store(Request $request){
        return response($this->restauranteRepository->store($request), 201);

    }

   

    public function update(Request $request, $id){
        return response($this->restauranteRepository->update($request, $id), 202);
    }

    public function destroy($id){
        return response($this->restauranteRepository->destroy($id), 204);
    }

    public function restore($id){
        return response($this->restauranteRepository->restore($id));
    }

    public function premium(){
        return response()->json(["restaurantes" => $this->restauranteRepository->premium()], 200);
    }

    public function getPremium($id){
        return response($this->restauranteRepository->getPremium($id));
    }

    public function cancelPremium($id){
        return response($this->restauranteRepository->cancelPremium($id));
    }

    public function atualizarSlide(Request $request, $id){

        $slide = FotoRestaurante::findOrFail($id);
        $slide->update($request->only('foto', 'descFoto'));
        return $slide->save();
        // return redirect('/restaurantes/slides')

    }

    public function verSlide($id){
        return FotoRestaurante::findOrFail($id);
        // return redirect('/restaurantes/slides')
        
    }

    public function apagarSlide($id){
        return FotoRestaurante::destroy($id);
        // return redirect('/restaurantes/slides')
        
    }



}
