<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Collection;

class UserRepository
{
    /**
     * Get user "friends"
     *
     * @param  User  $user
     * @return Collection
     */
    public function friendsForUser(User $user)
    {
        return $user->friends();
    }
}