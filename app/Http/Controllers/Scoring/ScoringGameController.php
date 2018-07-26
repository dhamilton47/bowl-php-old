<?php

namespace App\Http\Controllers\Scoring;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScoringGameController extends Controller
{
    public function show()
    {
        if (! auth()->user()) {
            return redirect(route('home'));
        }

        return view('scoring.game.show');
    }
}
