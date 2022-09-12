<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;


use App\Models\Cliente;

use Carbon\Carbon;

class AuthController extends Controller
{

    public function login(Request $request){
        $request->validate([
            "email" => 'required|string',
            "password" => 'required|string'
        ]);


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            if (is_null($user->first_login_at) && $user->level == 2) {
                $user->first_login_at = Carbon::now();
                $user->last_login_at  = Carbon::now();
                $user->update();
            }elseif (is_null($user->first_login_at) && $user->level!= 2 ) {
                $user->first_login_at = Carbon::now();
                $user->last_login_at  = Carbon::now();
                $user->save();
           }else{
                $user->last_login_at  = Carbon::now();
                $user->update();
           }




            $token = $user->createToken('JWT')->plainTextToken;
            $response =[
                "user" => $user,
                "token" => $token
            ];



            return response()->json($response, 200);
    
        }else{
            return response()->json(['message' => "usuario invalido"], 401);
        }
    }

    public function register(Request $request){
        $request->validate([
            "name" => "required|string",
            "email" => "required|string|unique:users,email",
            "password" => "required|string|confirmed"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
        ]);

        $response =[
            'user' => $user,
        ];

        return response($response, 201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(["message" => "sessão encerrada"]);
    }


    public function teste(){
        return auth()->user()->email;
    }

    public function getId(){
        $id = auth()->user()->id;
        return Cliente::select('id', 'user_id')->where('user_id', $id)->first();
    }
}
