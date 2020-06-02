<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the users list.
     *
     * @param  \App\User $user
     *
     * @return mixed
     */
    public function base(User $user)
    {
        return $user->can('user_base');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->can('user_view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('user_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return mixed
     */
    public function update(User $user)
    {
        // Must have the permission.

        return $user->can('user_edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return mixed
     */
    public function delete(User $user)
    {
        // Must have the permission.
        if (!$user->can('user_delete')) {
            return false;
        }
        // Good.
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return mixed
     */
    public function restore(User $user)
    {
        // Must have the permission.
        if (!$user->can('users_create')) {
            return false;
        }

        // Good.
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        // Must have the permission.
        if (!$user->can('users_delete')) {
            return false;
        }

        // Good.
        return true;
    }

    /**
     * Determine whether the user can lock the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return mixed
     */
    public function lock(User $user)
    {
        // Must have the permission.
        if (!$user->can('users_unlock')) {
            return false;
        }

        // Good.
        return true;
    }

    /**
     * Determine whether the user can unlock the model.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return mixed
     */
    public function unlock(User $user)
    {
        // Must have the permission.
        if (!$user->can('users_unlock')) {
            return false;
        }

        // Good.
        return true;
    }

    /**
     * Determine whether the user can modify the model's permissions.
     *
     * @param  \App\User $user
     * @param  \App\User $model
     *
     * @return mixed
     */
    public function permissions(User $user)
    {
        // Must have the permission.
        if (!$user->can('users_permissions')) {
            return false;
        }

        // Good.
        return true;
    }

    /**
     * Authorize all actions for Developer users.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function before(User $user)
    {
        // Developer users can do everything.
        if ($user->isDeveloper()) {
            return true;
        }
    }
}
