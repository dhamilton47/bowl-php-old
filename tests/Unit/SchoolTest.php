<?php

namespace Tests\Unit;

use App\Scorer;
use App\School;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    protected $school;

    public function setUp()
    {
        parent::setUp();

        $this->school = create(School::class);
    }

    /** @test */
    function a_school_has_a_name()
    {
        $school = create(School::class, ['school_name' => 'South Windsor High School']);

        $this->assertEquals($school->school_name, 'South Windsor High School');
    }

    /** @test */
    function a_school_has_a_city()
    {
        $school = create(School::class, ['school_city' => 'New Haven']);

        $this->assertEquals($school->school_city, 'New Haven');
    }

    /** @test */
    function a_school_has_a_state()
    {
        $school = create(School::class, ['school_state' => 'CT']);

        $this->assertEquals($school->school_state, 'CT');
    }

    /** @test */
    function a_school_has_a_district()
    {
        $school = create(School::class, ['school_district' => 'Metro']);

        $this->assertEquals($school->school_district, 'Metro');
    }

    /** @test */
    function a_school_has_a_path()
    {
        $this->assertEquals(
            "/admin/school/{$this->school->id}",
            $this->school->path()
        );
    }
}
