<?php

namespace Tests\Feature;

use App\Scorer;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    /** @test */
    public function a_scorer_has_a_profile()
    {
        $scorer = create(Scorer::class);

        $this->get("/profiles/{$scorer->scorer_username}")
            ->assertSee($scorer->scorer_name);
    }
}
