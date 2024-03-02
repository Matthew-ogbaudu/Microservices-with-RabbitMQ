<?php
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    public function test_user_can_be_created(): void
    {
        $userData = [
            'email' => $this->faker->email,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
        ];

        $this->json('POST', '/user/create', $userData);

        // $response->assertStatus(201);

        // $this->assertDatabaseHas('userservices', $userData);
    }
}
