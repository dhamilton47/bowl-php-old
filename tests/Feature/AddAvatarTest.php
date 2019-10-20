<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AddAvatarTest extends TestCase
{
    /** @test */
    public function only_scorers_can_add_avatars()
    {
        $this->withExceptionHandling();

        $this->json('POST', 'api/scorers/1/avatar')
            ->assertStatus(401);
    }

    /** @test */
    public function a_valid_avatar_must_be_provided()
    {
        $this->withExceptionHandling()->signIn();

        $this->json('POST', 'api/scorers/' . auth()->id() . '/avatar', [
            'scorer_avatar' => 'not-an-image'
        ])->assertStatus(422);
    }

    /** @test */
    public function a_scorer_may_add_an_avatar_to_their_profile()
    {
        $this->signIn();

        Storage::fake('public');

        $this->json('POST', route('avatar', auth()->id()), [
            'scorer_avatar' => $file = UploadedFile::fake()->image('avatar.jpg')
        ]);

        $this->assertEquals(asset('storage/avatars/' . $file->hashName()), auth()->user()->scorer_avatar_path);

        Storage::disk('public')->assertExists('avatars/' . $file->hashName());
    }
}
