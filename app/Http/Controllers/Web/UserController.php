<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
        $this->userRepository = new UserRepository($this->user);
    }

    public function store(Request $request){
        try{
            $this->userRepository->store($request);
            return redirect('/login');
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function destroy($id){
        $this->user = $this->user->findOrFail($id);
        $this->user->delete();
    }
}
