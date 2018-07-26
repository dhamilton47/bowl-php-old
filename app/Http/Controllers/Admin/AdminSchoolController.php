<?php

namespace App\Http\Controllers\Admin;

use App\School;
use App\Http\Controllers\Controller;

class AdminSchoolController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show()
    {
        $school = School::where('user_id', auth()->user()->id)->get()[0];

        if (! auth()->user()) {
            return redirect(route('home'));
        }

        return view('admin.school.show', compact('school'));
    }
}
