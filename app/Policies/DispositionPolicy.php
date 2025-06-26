<?php

namespace App\Policies;

use App\Models\Disposition;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DispositionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     *
     * @return mixed
     */
    public function view(User $user, Disposition $disposition)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     *
     * @return mixed
     */
    public function update(User $user, Disposition $disposition)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     *
     * @return mixed
     */
    public function delete(User $user, Disposition $disposition)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     *
     * @return mixed
     */
    public function restore(User $user, Disposition $disposition)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     *
     * @return mixed
     */
    public function forceDelete(User $user, Disposition $disposition)
    {
        return true;
    }
}
