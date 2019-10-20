@component('mail::message')
# One Last Step

We just need you to confirm your email address to prove that you're a human.

@component('mail::button', ['url' => url('/register/confirm?scorer_confirmation_token=' . $scorer->scorer_confirmation_token)])
    {{--@component('mail::button', ['url' => url('/register/confirm?token=' . $scorer->scorer_confirmation_token)])--}}
Confirm Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
