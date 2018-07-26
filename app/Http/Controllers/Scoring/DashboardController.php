<?php

namespace App\Http\Controllers\Scoring;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the main scoring dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()) {
            return redirect(route('home'));
        }

        return view('scoring.dashboard.index');
    }
}
