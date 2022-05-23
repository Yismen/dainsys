<?php

namespace App\Repositories;

use App\Models\Profile;

class Profiles
{
    private $profile;

    public static function all()
    {
        $user = auth()->user();

        return Profile::with('user')
            ->whereHas('user', function ($query) {
                return $query;
            })
            ->where('user_id', '<>', $user->id)
            ->paginate(18);
    }
}
