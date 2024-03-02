<?php

namespace Tests\Unit;

use App\Events\Usercreate;
use App\Listeners\UserCreateListener;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationsServiceTest extends TestCase
{
    public function test_created_event_is_logged(): void
    {
        // Arrange
        $user = Usercreate::factory()->create();
        $userCreateEvent = new Usercreate($user);

        // Act
        $userCreatedListener = new UserCreateListener();
        $userCreatedListener->handle($userCreateEvent);

        // Assert
        $this->assertFileExists(storage_path('user_created.log'));
        $this->assertStringContainsString($user->email, file_get_contents(storage_path('user_created.log')));
    }
}
