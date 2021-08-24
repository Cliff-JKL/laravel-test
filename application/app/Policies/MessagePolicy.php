<?php

namespace App\Policies;

use App\User;
use App\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Delete message policy
     *
     * @param  User  $user
     * @param  Message  $message
     * @return bool
     */
    public function destroy(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }
}