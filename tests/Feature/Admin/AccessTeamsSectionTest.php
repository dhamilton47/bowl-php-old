<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class AccessTeamsSectionTest extends TestCase
{
    /** @test */
    public function a_user_can_access_the_team_administration_section()
    {
        $this->withExceptionHandling()
            ->signIn()
            ->get(route('admin.team.show'))
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function a_guest_cannot_access_the_team_administration_section()
    {
        $this->withExceptionHandling()
            ->post(route('admin.team.show'))
            ->assertStatus(Response::HTTP_METHOD_NOT_ALLOWED);
    }
}
