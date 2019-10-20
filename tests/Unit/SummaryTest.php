<?php

namespace Tests\Unit;

use Tests\TestCase;

class SummaryTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }
//    protected $team;
//
//    public function setUp()
//    {
//        parent::setUp();
//
//        $this->team = create(School::class);
//    }
//
//    /** @test */
//    function a_team_has_a_path()
//    {
//        $team = create(\App\Thread::class);
//
//        $this->assertEquals(
//            "/threads/{$team->channel->slug}/{$team->slug}",
//            $team->path()
//        );
//    }
//
//    /** @test */
//    function a_school_has_a_creator()
//    {
//        $this->assertInstanceOf(\App\Scorer::class, $this->school->creator);
//    }
//
//    /** @test */
//    function a_school_has_replies()
//    {
//        $this->assertInstanceOf(
//            'Illuminate\Database\Eloquent\Collection',
//            $this->school->replies
//        );
//    }
//
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
//
//    /** @test */
//    public function a_school_can_add_a_reply()
//    {
//        $this->school->addReply([
//            'body' => 'Foobar',
//            'user_id' => 1
//        ]);
//
//        $this->assertCount(1, $this->school->replies);
//    }
//
//    /** @test */
//    function a_school_notifies_all_registered_subscribers_when_a_reply_is_added()
//    {
//        Notification::fake();
//
//        $this->signIn()
//            ->school
//            ->subscribe()
//            ->addReply([
//                'body' => 'Foobar',
//                'user_id' => create(\App\Scorer::class)->id
//            ]);
//
//        Notification::assertSentTo(auth()->user(), ThreadWasUpdated::class);
//    }
//
//    /** @test */
//    function a_school_belongs_to_a_channel()
//    {
//        $school = create(\App\Thread::class);
//
//        $this->assertInstanceOf(\App\Channel::class, $school->channel);
//    }
//
//    /** @test */
//    function a_school_can_be_subscribed_to()
//    {
//        $school = create(\App\Thread::class);
//
//        $school->subscribe($userId = 1);
//
//        $this->assertEquals(
//            1,
//            $school->subscriptions()->where('user_id', $userId)->count()
//        );
//    }
//
//    /** @test */
//    function a_school_can_be_unsubscribed_from()
//    {
//        $school = create(\App\Thread::class);
//
//        $school->subscribe($userId = 1);
//
//        $school->unsubscribe($userId);
//
//        $this->assertCount(0, $school->subscriptions);
//    }
//
//    /** @test */
//    function it_knows_if_the_authenticated_user_is_subscribed_to_it()
//    {
//        $school = create(\App\Thread::class);
//
//        $this->signIn();
//
//        $this->assertFalse($school->isSubscribedTo);
//
//        $school->subscribe();
//
//        $this->assertTrue($school->isSubscribedTo);
//    }
//
//    /** @test */
//    function a_school_can_check_if_the_authenticated_user_has_read_all_replies()
//    {
//        $this->signIn();
//
//        $school = create(\App\Thread::class);
//
//        tap(auth()->user(), function ($user) use ($school) {
//            $this->assertTrue($school->hasUpdatesFor($user));
//
//            $user->read($school);
//
//            $this->assertFalse($school->hasUpdatesFor($user));
//        });
//    }
//
//    /** @test */
//    function a_schools_body_is_sanitized_automatically()
//    {
//        $school = make(\App\Thread::class, ['body' => '<script>alert("bad")</script><p>This is okay.</p>']);
//
//        $this->assertEquals("<p>This is okay.</p>", $school->body);
//    }
}
