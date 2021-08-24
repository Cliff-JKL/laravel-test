<?php

namespace App\Repositories;

use App\Message;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MessageRepository
{
    /**
     * Get all messages that user sent.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->messages()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get all messages that user sent and received
     *
     * @param User $user
     * @return Collection
     */
    public function allMessagesForUser(User $user)
    {
        return Message::where('user_id', $user->id)
            ->orWhere('destination_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}