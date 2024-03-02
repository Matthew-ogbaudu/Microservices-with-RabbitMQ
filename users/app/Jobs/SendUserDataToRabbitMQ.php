<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\RabbitMQQueue;
use Illuminate\Support\Facades\Log;

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

        // try {
        //     log::info("MY BIG STEEZ2");

        //   error_log('User data being sent to RabbitMQ: ' . print_r($this->userData, true));

    // ... rest of your code ...

            // Publish the message to RabbitMQ using Laravel Queue RabbitMQ
            // $queue = app(RabbitMQQueue::class);
            // $queue->setContainer(app());
            // $queue->setConnection('rabbitmq');

            // $exchange = 'default';
            // //$test=json_encode($this->userData);


            //  $queue->publish(json_encode($userData), '', $exchange);

            // Log success after publishing
            // Log::info('User data sent successfully to RabbitMQ:', $userData);
    //     } catch (\Exception $e) {
    //         // Log any errors that occur during processing
    //         Log::error('Error processing SendUserDataToRabbitMQ: ' . $e->getMessage());
    //         throw $e;
    //     }
     }
}
