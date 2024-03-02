<?php

namespace App\Listeners;

use App\Events\Usercreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Queue;

class UserCreatedListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(Usercreate $event)
    {
        // Send data to RabbitMQ
        Queue::push('App\Jobs\SendUserDataToRabbitMQ', [
            'email' => $event->user->email,
            'firstName' => $event->user->firstName,
            'lastName' => $event->user->lastName,
        ]);
    }
}
