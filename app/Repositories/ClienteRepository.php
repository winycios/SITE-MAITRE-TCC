<?php


namespace App\Repositories;
use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\FoneCliente;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

class ClienteRepository{

	public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function store(Request $request){
        $request->validate($this->cliente->rules(), $this->cliente->feedback());

       /* return $this->cliente->create([
            "nome" => $request->nome,
            "cpf" => $request->cpf,
            "endereco" => $request->endereco,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "estado" => $request->estado,
            "cep" => $request->cep,
            "numero" => $request->numero,
            "user_id" => $request->user_id
        ]);*/

        $imagem = $request->file('foto');
        // $path = Storage::disk('s3')->put('imagens', $imagem, 'public');
        // Storage::disk('s3')->setVisibility($path, 'public');
        $name = $imagem->getClientOriginalName(); 
        $path = $imagem->storeAs('imagens', $name, 'public');


        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        // $cliente->foto = Storage::disk('s3')->url($path);
        $cliente->foto = $path;
        $cliente->cpf = $request->cpf;
        $cliente->endereco = $request->endereco;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        $cliente->numero = $request->numero;
        $cliente->user_id = $request->user_id;
        $cliente->save();

        $id = $cliente->id;

        FoneCliente::create([
            'descFone' => $request->fone,
            'cliente_id' => $id
        ]);

        return $cliente;

    }


    public function update(Request $request, $id){
        $this->cliente = $this->cliente->where('user_id', $id);  

        if($request->has('foto')){
            $imagem = $request->file('foto');

            $name = $imagem->getClientOriginalName(); 
            $path = $imagem->storeAs('imagens', $name, 'public');

            // $path = Storage::disk('s3')->put('imagens', $imagem, 'public');
            // Storage::disk('s3')->setVisibility($path, 'public');

            //$this->cliente->foto = Storage::disk('s3')->url($path);
            $this->cliente->foto =$path;

            $this->cliente->save();

            $this->cliente->update($request->only('nome','cep','endereco', 'numero', 'bairro', 'cidade', 'estado'));

            return User::join('clientes', 'clientes.user_id', 'users.id')->where('user_id', $id)->first();
        }else{
            $this->cliente->update($request->only('nome','cep','endereco', 'numero', 'bairro', 'cidade', 'estado'));
        }

       

        if($request->has('nome')){
            $u = User::findOrFail($id);
            $u->update([
                $u->name = $request->nome,
            ]);
        }

        return User::join('clientes', 'clientes.user_id', 'users.id')->where('user_id', $id)->first();
        
    }


    public function updateFone(Request $request, $id){
        $fone = FoneCliente::where('cliente_id', $id)->first();
        if($fone->descFone == $request->old_fone){
            $fone->update([
                'descFone' => $request->new_fone,
            ]);
            return User::join('clientes', 'clientes.user_id', 'users.id')->where('user_id', $id)->first();
        }else{
            return "Telefone atual inválido";
        }

    }
}

?>