<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function actors(User $user)
    {
        return $this->checkPermission($user, 1);
    }

    public function attributes(User $user)
    {
        return $this->checkPermission($user, 2);
    }

    public function categories(User $user)
    {
        return $this->checkPermission($user, 3);
    }

    public function customers(User $user)
    {
        return $this->checkPermission($user, 4);
    }

    public function directors(User $user)
    {
        return $this->checkPermission($user, 5);
    }

    public function seasons(User $user)
    {
        return $this->checkPermission($user, 6);
    }

    public function seasonEpisodes(User $user)
    {
        return $this->checkPermission($user, 7);
    }

    public function users(User $user)
    {
        return $this->checkPermission($user, 8);
    }

    public function verifications(User $user)
    {
        return $this->checkPermission($user, 9);
    }


    protected function checkPermission($user, $id)
    {
        return in_array($id, $user->permissions ?: []);
    }
}
