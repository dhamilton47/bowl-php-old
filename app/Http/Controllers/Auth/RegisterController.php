<?php

namespace App\Http\Controllers\Auth;

use App\Scorer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\PleaseConfirmYourEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'scorer_name' => 'max:255',
            'scorer_username' => 'required|max:255|unique:scorers|alpha_dash',
            'scorer_email' => 'required|email|max:255|unique:scorers',
            'scorer_password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Scorer
     */
    protected function create(array $data)
    {
        return Scorer::create([
            'scorer_name' => $data['scorer_name'],
            'scorer_username' => $data['scorer_username'],
            'scorer_email' => $data['scorer_email'],
            'scorer_password' => bcrypt($data['scorer_password']),
            'scorer_confirmation_token' => str_limit(md5($data['scorer_email'] . str_random()), 25, '')
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  Request  $request
     * @param  mixed    $scorer
     * @return mixed
     */
    protected function registered(Request $request, $scorer)
    {
//        dd($scorer);
        Mail::to($scorer)->send(new PleaseConfirmYourEmail($scorer));

        return redirect($this->redirectPath());
    }
}
