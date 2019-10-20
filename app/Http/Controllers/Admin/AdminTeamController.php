<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Http\Controllers\Controller;

class AdminTeamController extends Controller
{
    public function show()
    {
        $team = Team::where('scorer_id', auth()->user()->id)->get();

        if (! auth()->user()) {
            return redirect(route('home'));
        }

        return view('admin.team.show', compact('team'));
    }
}
