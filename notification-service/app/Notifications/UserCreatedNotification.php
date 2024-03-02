<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class UserCreatedNotification extends Notification
{
    public $userData;

    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    public function toRabbitMQ($notifiable)
    {
        return [
            'event' => 'user.created',
            'data' => [
                'email' => $this->userData['email'],
                'firstName' => $this->userData['firstName'],
                'lastName' => $this->userData['lastName'],
            ],
        ];
    }
}
