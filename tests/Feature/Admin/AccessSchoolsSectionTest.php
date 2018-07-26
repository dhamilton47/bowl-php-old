<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class AccessSchoolsSectionTest extends TestCase
{
//    /** @test */
//    public function a_user_can_access_the_school_admin_page()
//    {
////        $user = create(User::class);
//
//        $this->get("/admin/{school}");
////            ->assertSee($user->name);
//    }
    /** @test */
    public function a_user_can_access_the_school_administration_section()
    {
        $this->withExceptionHandling()
            ->signIn()
            ->get(route('admin.school.show'))
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function a_guest_cannot_access_the_school_administration_section()
    {
        $this->withExceptionHandling()
            ->post(route('admin.school.show'))
            ->assertStatus(Response::HTTP_METHOD_NOT_ALLOWED);
    }
}
