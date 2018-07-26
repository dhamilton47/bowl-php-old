<?php

namespace Tests\Feature\Scoring;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class AccessGamesSectionTest extends TestCase
{
    /** @test */
    public function a_user_can_access_the_scoring_section()
    {
        $this->withExceptionHandling()
            ->signIn()
            ->get(route('scoring.game.show'))
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function a_guest_cannot_access_the_scoring_section()
    {
        $this->withExceptionHandling()
            ->post(route('scoring.game.show'))
            ->assertStatus(Response::HTTP_METHOD_NOT_ALLOWED);
    }
}