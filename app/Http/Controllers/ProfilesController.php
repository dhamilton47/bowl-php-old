<?php

namespace App\Http\Controllers;

use App\Scorer;

class ProfilesController extends Controller
{
    public function show(Scorer $scorer)
    {
        return view('profiles.show', [
            'profileScorer' => $scorer,
        ]);
    }
}
