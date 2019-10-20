<?php

namespace Tests\Unit;

use App\Scorer;
use App\Team;
use App\School;
use Tests\TestCase;

class TeamTest extends TestCase
{
    protected $team;

    public function setUp()
    {
        parent::setUp();

        $this->team = create(Team::class);
    }

    /** @test */
    function a_team_has_a_path()
    {
        $this->assertEquals(
            "/admin/school/team/{$this->team->id}",
            $this->team->path()
        );
    }

    /** @test */
    function a_team_has_a_school()
    {
        $this->assertInstanceOf(School::class, $this->team->school);
    }

//    /** @test */
//    function a_team_has_a_owner()
//    {
//        $this->assertInstanceOf(Scorer::class, $this->team->owner);
//    }

//    /** @test */
//    function a_team_has_a_typeOf()
//    {
//        $team = create(Team::class, ['typeOf' => 'gender']);
//
//        $this->assertEquals($team->typeOf, 'gender');
//    }
//
//    /** @test */
//    function a_team_has_a_levelOf()
//    {
//        $team = create(Team::class, ['levelOf' => 'varsity']);
//
//        $this->assertEquals($team->levelOf, 'varsity');
//    }
}
