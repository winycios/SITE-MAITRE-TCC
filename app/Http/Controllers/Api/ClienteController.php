<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;


class ClienteController extends Controller
{

    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
        $this->ClienteRepository = new ClienteRepository($this->cliente);
    }

    public function index(){
        return Cliente::all();
    }

    public function show($id){
        //$cliente = Cliente::findOrFail($id);
        return response()->json(['cliente' => User::join('clientes', 'clientes.user_id', 'users.id')->where('user_id', $id)->first()]);
        //return response($cliente, 200);
    }

    public function store(Request $request){
        return $this->ClienteRepository->store($request);

    


    }

    public function update(Request $request, $id){
        return $this->ClienteRepository->update($request, $id);
    }

    
    public function updateFone(Request $request, $id){
        return $this->ClienteRepository->updateFone($request, $id);
    }
}
