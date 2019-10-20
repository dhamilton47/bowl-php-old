<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ScorerTest extends TestCase
{
    /** @test */
    public function a_scorer_can_determine_their_avatar_path()
    {
        $scorer = create('App\Scorer');

        $this->assertEquals(asset('images/avatars/default.png'), $scorer->scoreravatar_path);

        $scorer->scoreravatar_path = 'avatars/me.jpg';

        $this->assertEquals(asset('storage/avatars/me.jpg'), $scorer->scoreravatar_path);
    }
}
