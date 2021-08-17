<?php

namespace App\Repositories;

use App\User;

class MessageRepository
{
    /**
     * Получить все сообщения заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->messages()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}