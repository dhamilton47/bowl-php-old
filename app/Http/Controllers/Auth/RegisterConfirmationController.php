<?php

namespace App\Http\Controllers\Auth;

use App\Scorer;
use App\Http\Controllers\Controller;

class RegisterConfirmationController extends Controller
{
    /**
     * Confirm a user's email address.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $scorer = Scorer::where('scorer_confirmation_token', request('scorer_confirmation_token'))->first();

        if (! $scorer) {
            return redirect(route('home'))
                ->with('flash', 'Invalid email confirmation.');
        }

        $scorer->confirm();

        return redirect(route('home'))
            ->with('flash', 'Your account is now active.');
    }
}
