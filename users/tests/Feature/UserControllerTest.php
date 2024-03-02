<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use WithFaker;

    public function test_user_can_be_created_via_api()
    {
        $userData = [
            'email' => $this->faker->email,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
        ];
        $response = $this->json('POST', '/user/create', $userData);
       // dd($response);
        $response->assertStatus(201);

        //$this->assertDatabaseHas('usersservice', $userData);
    }
}
