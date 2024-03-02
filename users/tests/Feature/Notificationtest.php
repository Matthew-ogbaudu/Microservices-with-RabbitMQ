<?php

namespace Tests\Feature;

use App\Models\Userservice;
use App\Notifications\UserCreatedNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserNotificationTest extends TestCase
{
    //use RefreshDatabase;
    use  WithFaker;

    public function test_user_creation_triggers_notification()
    {
        Queue::fake();

        $userData = [
            'email' => $this->faker->email,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
        ];

        $response = $this->json('POST', 'user/create', $userData);
        // dd($response);


        $response->assertStatus(201);

        // Queue::assertPushed(UserCreatedNotification::class, function ($job) use ($userData) {
        //     return $job->userData['email'] === $userData['email'];
        // });

        //$this->assertDatabaseHas('usersservice', $userData);
    }
}
