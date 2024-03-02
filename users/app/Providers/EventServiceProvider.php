<?php

namespace App\Providers;

use App\Events\Usercreate;
use App\Listeners\UserCreatedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Usercreate::class => [
            UserCreatedListener::class,
        ],
    ];
}
