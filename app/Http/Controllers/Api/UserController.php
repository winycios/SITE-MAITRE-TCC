<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Reserva;


use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
        $this->userRepository = new UserRepository($this->user);
    }

    public function index(){
        return $this->userRepository->index();
    }

    public function show($id){
        return $this->userRepository->show($id);
    }

    public function teste(){
        return $this->user->select('profile_photo_url')->get();
    }
}
