<?php

namespace App\Http\Controllers;

use App\Message;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;

class MessageController extends Controller
{
    /**
     * MessageRepository.
     *
     * @var MessageRepository
     */
    protected $messages;

    /**
     * UserRepository
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Controller constructor
     *
     * @param  MessageRepository  $messages
     * @param UserRepository $users
     * @return void
     */
    public function __construct(MessageRepository $messages, UserRepository $users)
    {
        $this->middleware('auth');
        $this->messages = $messages;
        $this->users = $users;
    }

    /**
     Show message list
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('messages.index', [
            'messages' => $this->messages->forUser($request->user()),
            'friends' => $this->users->friendsForUser($request->user()),
            'allMessages' => $this->messages->allMessagesForUser($request->user()),
        ]);
    }

    /**
     * Create message
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|max:255',
        ]);

        $request->user()->messages()->create([
            'text' => $request->text,
            'destination_id' => $request->destination_id,
        ]);

        return redirect('/messages');
    }

    /**
     * Destroy message
     *
     * @param  Request  $request
     * @param  Message  $message
     * @return Response
     */
    public function destroy(Request $request, Message  $message)
    {
        $this->authorize('destroy', $message);

        $message->delete();

        return redirect('/messages');
    }
}
