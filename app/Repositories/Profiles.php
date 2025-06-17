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
            ->whereHas('user', fn($query) => $query)
            ->where('user_id', '<>', $user->id)
            ->paginate(18);
    }
}
