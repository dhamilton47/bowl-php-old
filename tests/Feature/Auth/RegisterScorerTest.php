<?php

namespace Tests\Feature\Auth;

use App\Scorer;
use Tests\TestCase;
use App\Mail\PleaseConfirmYourEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterScorerTest extends TestCase implements ShouldQueue
{
    public function setUp()
    {
        parent::setUp();

        Mail::fake();
    }

    /** @test */
    public function scorers_can_register_an_account()
    {
        $response = $this->post(route('register'), [
            'scorer_name' => 'John Doe',
            'scorer_username' => 'johndoe',
            'scorer_email' => 'johndoe@example.com',
            'scorer_password' => 'secret',
            'scorer_password_confirmation' => 'secret',
        ]);

        $response->assertRedirect('');

        $this->assertTrue(Auth::check());
        $this->assertCount(1, Scorer::all());

        tap(Scorer::first(), function ($scorer) {
            $this->assertEquals('John Doe', $scorer->scorer_name);
            $this->assertEquals('johndoe', $scorer->scorer_username);
            $this->assertEquals('johndoe@example.com', $scorer->scorer_email);
            $this->assertTrue(Hash::check('secret', $scorer->scorer_password));
        });
    }

    /** @test */
    public function a_confirmation_email_is_sent_upon_registration()
    {
        $this->post(route('register'), $this->validParams());

        Mail::assertQueued(PleaseConfirmYourEmail::class);
    }

    /** @test */
    public function scorer_can_fully_confirm_their_email_addresses()
    {
        $this->post(route('register'), $this->validParams([
            'scorer_email' => 'john@example.com',
        ]));

        $scorer = Scorer::where('scorer_email', 'john@example.com')->first();

        $this->assertFalse($scorer->scorer_confirmed);
        $this->assertNotNull($scorer->scorer_confirmation_token);

        $this->get(route('register.confirm', ['scorer_confirmation_token' => $scorer->scorer_confirmation_token]))
            ->assertRedirect(route('home'));

        tap($scorer->fresh(), function ($scorer) {
            $this->assertTrue($scorer->scorer_confirmed);
            $this->assertNull($scorer->scorer_confirmation_token);
        });
    }

    /** @test */
    public function confirming_an_invalid_token()
    {
        $this->get(route('register.confirm', ['scorer_token' => 'invalid']))
            ->assertRedirect(route('home'))
            ->assertSessionHas('flash', 'Invalid email confirmation.');
    }

    /** @test */
    public function scorer_name_is_optional()
    {
        $response = $this->post(route('register'), $this->validParams([
            'scorer_name' => '',
        ]));

        $response->assertRedirect(route('home'));
        $this->assertTrue(Auth::check());
        $this->assertCount(1, Scorer::all());
    }

    /** @test */
    public function scorer_name_cannot_exceed_255_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_name' => str_repeat('a', 256),
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_name');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_username_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_username' => '',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_username_is_url_safe()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_username' => 'spaces and symbols!',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_username_cannot_exceed_255_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_username' => str_repeat('a', 256),
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_username');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_username_is_unique()
    {
        create(Scorer::class, ['scorer_username' => 'john']);
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_username' => 'john',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_username');
        $this->assertFalse(Auth::check());
        $this->assertCount(1, Scorer::all());
    }

    /** @test */
    public function scorer_email_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_email' => '',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_email_is_valid()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_email' => 'not-an-email-address',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_email_cannot_exceed_255_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_email' => substr(str_repeat('a', 256) . '@example.com', -256),
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_email');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_email_is_unique()
    {
        create(Scorer::class, ['scorer_email' => 'johndoe@example.com']);
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_email' => 'johndoe@example.com',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_email');
        $this->assertFalse(Auth::check());
        $this->assertCount(1, Scorer::all());
    }

    /** @test */
    public function scorer_password_is_required()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_password' => '',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_password');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_password_must_be_confirmed()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_password' => 'foo',
            'scorer_password_confirmation' => 'bar'
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_password');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    /** @test */
    public function scorer_password_must_be_6_chars()
    {
        $this->withExceptionHandling();
        $this->from(route('register'));

        $response = $this->post(route('register'), $this->validParams([
            'scorer_password' => 'foo',
            'scorer_password_confirmation' => 'foo',
        ]));

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('scorer_password');
        $this->assertFalse(Auth::check());
        $this->assertCount(0, Scorer::all());
    }

    private function validParams($overrides = [])
    {
        return array_merge([
            'scorer_name' => 'John Doe',
            'scorer_username' => 'johndoe',
            'scorer_email' => 'johndoe@example.com',
            'scorer_password' => 'secret',
            'scorer_password_confirmation' => 'secret',
        ], $overrides);
    }
}