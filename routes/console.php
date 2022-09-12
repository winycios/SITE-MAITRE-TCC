<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('addAdmin', function(){
    $user = new App\Models\User;
    $user->name = 'Admin';
    $user->email = 'admin@admin.com';
    $user->password = Hash::make('admin123');
    $user->level = 3;
    $user->save();
})->purpose('Add admin user');

Artisan::command('addRest', function(){
    $user = new App\Models\User;
    $user->name = 'rest';
    $user->email = 'rest@rest.com';
    $user->password = Hash::make('rest123');
    $user->level = 2;
    $user->save();
})->purpose('Add rest user');
