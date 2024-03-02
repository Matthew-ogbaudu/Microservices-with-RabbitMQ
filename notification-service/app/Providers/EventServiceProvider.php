<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserCreate;
use App\Jobs\TestJob;
use App\Jobs\SendUserDataToRabbitMQ;

class EventServiceProvider extends ServiceProvider
{
    /**

     * Register any events for your application.
     */
    public function boot()

    {
        // App::bindMethod(TestJob::class . '@handle', fn($job)=>$job->handle());
          App::bindMethod(SendUserDataToRabbitMQ::class . '@handle', fn($job)=>$job->handle());

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */

}
