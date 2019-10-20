<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ScorersAvatarController extends Controller
{
    /**
     * Store a new scorer avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'scorer_avatar' => ['required', 'image']
        ]);

        Storage::disk('public')->delete(auth()->user()->getOriginal('scorer_avatar_path'));

        auth()->user()->update([
            'scorer_avatar_path' => request()->file('scorer_avatar')->store('avatars', 'public')
        ]);

        return response([], 204);
    }
}
