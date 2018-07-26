<?php

namespace App\Http\Controllers\Scoring;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScoringSummaryController extends Controller
{
    public function show()
    {
        if (! auth()->user()) {
            return redirect(route('home'));
        }

        return view('scoring.summary.show');
    }
}
