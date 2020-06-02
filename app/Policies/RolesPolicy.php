<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the users list.
     *
     * @param  \App\Role $user
     *
     * @return mixed
     */
    public function base(User $user)
    {
        return $user->can('role_base');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Atpl $atpl
     * @param  \App\Atpl $model
     *
     * @return mixed
     */
    public function view(User $user)
    {
        // Must have the permission.
        if (!$user->can('role_view')) {
            return false;
        }

        // Good.
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Atpl $atpl
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('role_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Atpl $atpl
     * @param  \App\Atpl $model
     *
     * @return mixed
     */
    public function edit(User $user)
    {
        // Must have the permission.
        if (!$user->can('role_edit')) {
            return false;
        }

        // Good.
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Atpl $atpl
     * @param  \App\Atpl $model
     *
     * @return mixed
     */
    public function delete(User $user)
    {
        // Must have the permission.
        if (!$user->can('atpl_delete')) {
            return false;
        }

        // Good.
        return true;
    }

    /**
     * Determine whether the user can modify the model's permissions.
     *
     * @param  \App\Atpl $atpl
     * @param  \App\Atpl $model
     *
     * @return mixed
     */
    public function permissions(User $user)
    {
        // Must have the permission.
        if (!$user->can('atpl_permissions')) {
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
