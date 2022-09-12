<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\User;
use App\Observers\UserObserver;

use App\Models\Restaurante;
use App\Observers\RestauranteObserver;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }
    
    public function boot()
    {
        //User::observe(UserObserver::class);
        //Restaurante::observe(RestauranteObserver::class);
    }
}
