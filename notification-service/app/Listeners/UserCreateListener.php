<?php

namespace App\Listeners;

use App\Events\AppEventsUserCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Usercreate;
use Illuminate\Support\Facades\Storage;
use App\Jobs\User;

class UserCreateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

    public function handle(Usercreate $event)
{
    $user = $event->user;

    $log = "User created: {$user->email}, {$user->firstName}, {$user->lastName}";

    Storage::disk('local')->append('user_created.log', $log);
}
}
