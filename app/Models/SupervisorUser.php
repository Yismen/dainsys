<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class SupervisorUser extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'supervisor_user';

    public function syncRelationship(array $data)
    {
        foreach ((array) $data['user_ids'] as $user) {
            User::find($user)
                ->supervisors()
                ->attach((array) $data['supervisor_ids']);
        }

        return $this;
    }
}
