<?php

namespace App\Policies;

use App\User;
use App\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicyPolicy
{
    use HandlesAuthorization;

    /**
     * Определяем, может ли данный пользователь удалить данную задачу.
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