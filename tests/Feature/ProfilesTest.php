<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    /** @test */
    public function a_user_has_a_profile()
    {
        $user = create(User::class);

        $this->get("/profiles/{$user->username}")
            ->assertSee($user->name);
    }
}
