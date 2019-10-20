<?php

namespace App\Http\Controllers\Api;

use App\Scorer;
use App\Http\Controllers\Controller;

class ScorersController extends Controller
{
    /**
     * Fetch all relevant scorer_username.
     *
     * @return mixed
     */
    public function index()
    {
        $search = request('scorer_username');

        return Scorer::where('scorer_username', 'LIKE', "%$search%")
            ->take(5)
            ->pluck('scorer_username');
    }
}
