<?php

namespace App\Policies;

use App\Models\Recipient;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     *
     * @return mixed
     */
    public function viewAny(User $user) {}

    /**
     * Determine whether the user can view the model.
     *
     *
     * @return mixed
     */
    public function view(User $user, Recipient $recipient) {}

    /**
     * Determine whether the user can create models.
     *
     *
     * @return mixed
     */
    public function create(User $user) {}

    /**
     * Determine whether the user can update the model.
     *
     *
     * @return mixed
     */
    public function update(User $user, Recipient $recipient) {}

    /**
     * Determine whether the user can delete the model.
     *
     *
     * @return mixed
     */
    public function delete(User $user, Recipient $recipient) {}

    /**
     * Determine whether the user can restore the model.
     *
     *
     * @return mixed
     */
    public function restore(User $user, Recipient $recipient) {}

    /**
     * Determine whether the user can permanently delete the model.
     *
     *
     * @return mixed
     */
    public function forceDelete(User $user, Recipient $recipient) {}
}
