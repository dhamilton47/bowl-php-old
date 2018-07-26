<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the main admin dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()) {
            return redirect(route('home'));
        }

        return view('admin.dashboard.index');
    }
}
