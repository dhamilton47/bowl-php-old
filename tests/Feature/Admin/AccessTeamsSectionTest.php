<?php

namespace Tests\Feature\Admin;

use App\Team;
use App\Scorer;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class AccessTeamsSectionTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }
//    /** @test */
//    public function a_scorer_can_access_the_team_administration_section()
//    {
//        $team = create(Team::class, ['scorer_id' => 1]);
//
//        $this->withExceptionHandling()
//            ->signIn(create(Scorer::class, ['id' => 1]))
//            ->get(route('admin.team.show', $team))
//            ->assertStatus(Response::HTTP_OK);
//    }
//
//    /** @test */
//    public function a_guest_cannot_access_the_team_administration_section()
//    {
//        $team = create(Team::class, ['scorer_id' => 1]);
//
//        $this->withExceptionHandling()
//            ->post(route('admin.team.show', $team))
//            ->assertStatus(Response::HTTP_METHOD_NOT_ALLOWED);
//    }
}
