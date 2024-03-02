<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use App\Jobs\SendUserDataToRabbitMQ;
use Illuminate\Console\Command;

class FireEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fire';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userData = [
            'email' => 'jidepabloggr@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
        ];
        SendUserDataToRabbitMQ::dispatch($userData);
    }
}
