<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class AccessAdminSectionTest extends TestCase
{
    /** @test */
    public function a_usscorer_can_access_the_administration_section()
    {
        $this->withExceptionHandling()
            ->signIn()
            ->get(route('admin.dashboard.index'))
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function a_guest_cannot_access_the_administration_section()
    {
        $this->withExceptionHandling()
            ->post(route('admin.dashboard.index'))
            ->assertStatus(Response::HTTP_METHOD_NOT_ALLOWED);
    }
}
