<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTeamController extends Controller
{
    public function show()
    {
        if (! auth()->user()) {
            return redirect(route('home'));
        }

        return view('admin.team.show');
    }
}
