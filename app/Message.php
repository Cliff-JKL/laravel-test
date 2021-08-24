<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'destination_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function destinationUser()
    {
        return $this->belongsTo(User::class, 'destination_id');
    }
}