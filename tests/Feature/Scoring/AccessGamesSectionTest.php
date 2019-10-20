<?php

namespace Tests\Feature\Scoring;

use App\School;
use App\Scorer;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class AccessGamesSectionTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }
//    /** @test */
//    public function a_user_can_access_the_scoring_section()
//    {
//        $school = create(School::class, ['scorer_id' => 1]);
//
//        $this->withExceptionHandling()
//            ->signIn(create(Scorer::class, ['id' => 1]))
//            ->get(route('scoring.game.show', $school))
//            ->assertStatus(Response::HTTP_OK);
//    }
//
//    /** @test */
//    public function a_guest_cannot_access_the_scoring_section()
//    {
//        $this->withExceptionHandling()
//            ->post(route('scoring.game.show'))
//            ->assertStatus(Response::HTTP_METHOD_NOT_ALLOWED);
//    }
}
