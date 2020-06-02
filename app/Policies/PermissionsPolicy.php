<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionsPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the users list.
     *
     * @param  \App\Permission $user
     *
     * @return mixed
     */
    public function base(User $user)
    {
        if ($user->isDeveloper()) {
            return true;
        }

        return false;
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
