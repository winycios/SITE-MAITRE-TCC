<?php

namespace App\Observers;

use App\Jobs\SendWelcomeEmail;
use App\Models\User;

class UserObserver
{
 
    public function created(User $user)
    {
        //SendWelcomeEmail::dispatch($user);
    }

    public function updated(User $user)
    {
        //
    }

    
    public function deleted(User $user)
    {
        //
    }

   
    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
