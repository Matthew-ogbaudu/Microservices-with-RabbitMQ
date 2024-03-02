<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class SendUserDataToRabbitMQ implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userData;

    public function __construct($userData)
    {
        $this->userData = $userData;

    }

    public function handle()
    {
        $log = [
            "email" => $this->userData['email'],
            "firstName" => $this->userData['firstName'],
            "lastName" => $this->userData['lastName'],

        ];
        echo print_r($log, true) . PHP_EOL;
        // $jsonData = json_decode($this->userData, true);
        // Log the data to a custom log file
        $logFilePath = storage_path('logs/user_data.log');
        $logMessage = date('Y-m-d H:i:s') . ' - Received User Data: ' . json_encode($log) . PHP_EOL;

        // Ensure the directory for the log file exists
        File::ensureDirectoryExists(dirname($logFilePath));

        // Append the log message to the log file
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);

    }
}
