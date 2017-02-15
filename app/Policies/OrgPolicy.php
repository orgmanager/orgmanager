<?php

namespace App\Policies;

use App\Org;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrgPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the org.
     *
     * @return bool
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can create orgs.
     *
     * @return bool
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the org.
     *
     * @param \App\User $user
     * @param \App\Org  $org
     *
     * @return bool
     */
    public function update(User $user, Org $org)
    {
        return $user->id === $org->user->id;
    }

    /**
     * Determine whether the user can delete the org.
     *
     * @param \App\User $user
     * @param \App\Org  $org
     *
     * @return bool
     */
    public function delete(User $user, Org $org)
    {
        return $user->id === $org->user->id;
    }

    /**
     * Determine whether the user can join the org.
     *
     * @param \App\User $user
     * @param \App\Org  $org
     *
     * @return bool
     */
    public function join(User $user, Org $org)
    {
        return $user->id === $org->user->id;
    }
}
