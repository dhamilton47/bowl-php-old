<?php

namespace Tests\Unit;

use App\User;
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
        $school = create(School::class, ['name' => 'South Windsor High School']);

        $this->assertEquals($school->name, 'South Windsor High School');
    }

    /** @test */
    function a_school_has_a_city()
    {
        $school = create(School::class, ['city' => 'New Haven']);

        $this->assertEquals($school->city, 'New Haven');
    }

    /** @test */
    function a_school_has_a_state()
    {
        $school = create(School::class, ['state' => 'CT']);

        $this->assertEquals($school->state, 'CT');
    }

    /** @test */
    function a_school_has_a_district()
    {
        $school = create(School::class, ['district' => 'Metro']);

        $this->assertEquals($school->district, 'Metro');
    }

    /** @test */
    function a_school_has_a_path()
    {
        $this->assertEquals(
            "/admin/school/{$this->school->id}",
            $this->school->path()
        );
    }

    /** @test */
    function a_school_has_a_owner()
    {
        $this->assertInstanceOf(User::class, $this->school->owner);
    }

//    /** @test */
//    function a_school_has_teams()
//    {
//        $this->assertInstanceOf(
//            'Illuminate\Database\Eloquent\Collection',
//            $this->school->teams
//        );
//    }

//    /** @test */
//    function a_school_can_have_a_best_reply()
//    {
//        $reply = $this->school->addReply([
//            'body' => 'Foobar',
//            'user_id' => 1
//        ]);
//
//        $this->school->markBestReply($reply);
//
//        $this->assertEquals($reply->id, $this->school->bestReply->id);
//    }

//    /** @test */
//    public function a_school_can_add_a_team()
//    {
//        $this->school->addTeam([
//            'type' => 'Foobar',
//            'school_id' => 1
//        ]);
//
//        $this->assertCount(1, $this->school->team);
//    }

//    /** @test */
//    function a_school_can_be_subscribed_to()
//    {
//        $school = create(School::class);
//
//        $school->subscribe($userId = 1);
//
//        $this->assertEquals(
//            1,
//            $school->subscriptions()->where('user_id', $userId)->count()
//        );
//    }

//    /** @test */
//    function a_school_can_be_unsubscribed_from()
//    {
//        $school = create(School::class);
//
//        $school->subscribe($userId = 1);
//
//        $school->unsubscribe($userId);
//
//        $this->assertCount(0, $school->subscriptions);
//    }

//    /** @test */
//    function it_knows_if_the_authenticated_user_is_subscribed_to_it()
//    {
//        $school = create(School::class);
//
//        $this->signIn();
//
//        $this->assertFalse($school->isSubscribedTo);
//
//        $school->subscribe();
//
//        $this->assertTrue($school->isSubscribedTo);
//    }

//    /** @test */
//    function a_school_can_check_if_the_authenticated_user_has_read_all_replies()
//    {
//        $this->signIn();
//
//        $school = create(School::class);
//
//        tap(auth()->user(), function ($user) use ($school) {
//            $this->assertTrue($school->hasUpdatesFor($user));
//
//            $user->read($school);
//
//            $this->assertFalse($school->hasUpdatesFor($user));
//        });
//    }

//    /** @test */
//    function a_schools_body_is_sanitized_automatically()
//    {
//        $school = make(School::class, ['body' => '<script>alert("bad")</script><p>This is okay.</p>']);
//
//        $this->assertEquals("<p>This is okay.</p>", $school->body);
//    }
}
