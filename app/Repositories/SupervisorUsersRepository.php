<?php

namespace App\Repositories;

use App\Models\Supervisor;
use App\Models\User;

class SupervisorUsersRepository
{
    public function data()
    {
        return [
            'assigned' => $this->assigned(),
            'free_users' => $this->freeUsers(),
            'free_supervisors' => $this->freeSupervisors(),
        ];
    }

    public function assigned()
    {
        return User::whereHas('supervisors')
            ->with('supervisors', 'roles')
            ->get();
    }

    public function freeUsers()
    {
        return User::with('roles')
            ->get();
    }

    public function freeSupervisors()
    {
        return Supervisor::whereDoesntHave('users')
            ->actives()
            ->get();
    }
}
