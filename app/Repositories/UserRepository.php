<?php


namespace App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Restaurante;


use Mail;
use DB;

class UserRepository{

	public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        return $this->user->all();
    }

    public function show($id){
        return $this->user->findOrFail($id);
    }

    public function store(Request $request){
        $request->validate($this->user->rules(), $this->user->feedback());

         try{
            \DB::beginTransaction();
    
            $user = new User;
            $senha = Hash::make($request->password);
    
            $user->name = $request->nome;
            $user->email = $request->email;
            $user->password = $senha;
            $user->level = $request->level;
    
            $user->save();
            $id = $user->id;

            $request->merge(['user_id' => $id]);
            $request->merge(['foto' => $request->foto]);
            $request->merge(['categoria_id' => 1]);
    
            if($user->level == 1){
                $r = new ClienteRepository(new Cliente);
                $r->store($request);
                \DB::commit();
                /*
                try{
                    Mail::send('mail.welcome', ['nome' => $request->nome], function($m) use($request){
                        $m->from('atlanticmaitre@gmail.com', 'MAÎTRE');
                        $m->subject('Bem vindo ao MAÎTRE!');
                        $m->to($request->email);
                    });
                }catch(\Exception $ignored){
                    
                }
                */
        
                
                
            }
            if($user->level == 2){
                \DB::commit();
                //return redirect('/restaurantes/create');
                /*$r = new RestauranteRepository(new Restaurante);
                $r->store($request);
                
                
                Mail::send('mail.welcome', ['nome' => $request->nome], function($m) use($request){
                    $m->from('atlanticmaitre@gmail.com', 'MAÎTRE');
                    $m->subject('Bem vindo ao MAÎTRE!');
                    $m->to($request->email);
                });*/

            }
        }catch(\Exception $e){
            \DB::rollback();
            throw $e;

        }
    }

}

?>