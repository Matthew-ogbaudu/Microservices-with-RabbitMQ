<?php
//To Test User Can be created into our database
namespace Tests\Unit;

use App\Models\Userservice;
use Tests\TestCase;

class UserTest extends TestCase
{
    //use RefreshDatabase;

    public function test_user_can_be_created()
    {
        $user = Userservice::factory()->create([
            'email' => 'test5@example.com',
            'firstName' => 'Matthew2',
            'lastName' => 'Matthew2',
        ]);
        // dd($user);
        $this->assertDatabaseHas('usersservice', [
            'email' => 'test5@example.com',
            'firstName' => 'Matthew2',
            'lastName' => 'Matthew2',
        ]);
    }
}
