<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\User;


use App\Models\FoneCliente;

use App\Repositories\ClienteRepository;

use DB;

class ClienteController extends Controller
{

    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
        $this->ClienteRepository = new ClienteRepository($this->cliente);
    }


    public function index(){
        $estrelas =  Restaurante::leftJoin('avaliacoes', 'restaurantes.id', 'avaliacoes.restaurante_id')->select(DB::raw( 'AVG( avaliacoes.estrelas ) as estrelas' ))->get();

        $restaurantes = Restaurante::select('restaurantes.id', 'restaurantes.foto', 'restaurantes.nome', 'restaurantes.descricao', 
            'restaurantes.level', 'restaurantes.estado', 'restaurantes.cidade',
            'restaurantes.bairro', 'restaurantes.endereco', 'restaurantes.numero',
            'restaurantes.cep',
            'categoria_restaurantes.categoria')->join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id')->get();
        //$restaurantes = Restaurante::all();        
        // $restaurantes = Restaurante::join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id')->get();
        $premium = Restaurante::where('level', 2)->get();
        return view('welcome', ['restaurantes' => $restaurantes, 'premium' => $premium, 'estrelas' => $estrelas]);
    }

    public function store(Request $request, $id){
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->endereco = $request->endereco;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        $cliente->numero = $request->num;
        $cliente->user_id = $id;
        $cliente->save();

        $id = $cliente->id;

        FoneCliente::create([
            'descFone' => $request->fone,
            'cliente_id' => $id
        ]);


    }

    public function update(Request $request, $id){
        $this->ClienteRepository->update($request, $id);
        $reservas = Reserva::where('reservas.cliente_id', $id)->get();
        return view('clientes.profile', ['reservas' => $reservas, 'cliente' => User::join('clientes', 'clientes.user_id', 'users.id')->where('user_id', $id)->first()]);
    }

    public function destroy($id){

        $c =Cliente::where('user_id', $id)->first();
        FoneCliente::where('cliente_id', $c->id)->first()->delete();
        $c->forceDelete();
        User::findOrFail($id)->forceDelete();
        return redirect('/login');
    }

    public function profile($id){
        $c =  Cliente::where('user_id', $id)->first();
        $f = FoneCliente::where('cliente_id', $c->id)->first();
        
        return view('clientes.profile', ['fone' => $f, 'cliente' => User::join('clientes', 'clientes.user_id', 'users.id')->where('user_id', $id)->first()]);
    }
}
