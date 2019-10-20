<?php

namespace Tests\Feature\Admin;

use App\Scorer;
use App\School;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class AccessSchoolsSectionTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }
//    /** @test */
//    public function a_user_can_access_the_school_administration_section()
//    {
//        $school = create(School::class, ['scorer_id' => 1]);
//
//        $this->withExceptionHandling()
//            ->signIn(create(Scorer::class, ['id' => 1]))
//            ->get(route('admin.school.show', $school))
//            ->assertStatus(Response::HTTP_OK);
//    }

//    /** @test */
//    public function a_guest_cannot_access_the_school_administration_section()
//    {
//        $school = create(School::class, ['scorer_id' => 1]);
//
//        $this->withExceptionHandling()
//            ->post(route('admin.school.show', $school))
//            ->assertStatus(Response::HTTP_METHOD_NOT_ALLOWED);
//    }
}
