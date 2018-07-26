<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminSchoolController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show()
    {
        if (! auth()->user()) {
            return redirect(route('home'));
        }

        return view('admin.school.show');
    }
}
