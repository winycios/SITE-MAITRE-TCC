<?php

namespace App\Observers;

use App\Models\Restaurante;
use App\MOdels\User;

class RestauranteObserver
{
    public function deleted(Restaurante $restaurante)
    {
        //return 'destroy';
        $u = User::join('restaurantes', 'users.id', 'restaurantes.user_id')->where('restaurantes.user_id', $restaurante->user_id)->first();

        $u->delete();
    }
}