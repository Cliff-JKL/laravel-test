<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
    /**
     * Экземпляр TaskRepository.
     *
     * @var MessageRepository
     */
    protected $messages;

    /**
     * Создание нового экземпляра контроллера.
     *
     * @param  MessageRepository  $messages
     * @return void
     */
    public function __construct(MessageRepository $messages)
    {
        $this->middleware('auth');
        $this->messages = $messages;
    }

    /**
     * Показать список всех задач пользователя.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('messages.index', [
            'messages' => $this->messages->forUser($request->user()),
        ]);
    }

    /**
     * Создание новой задачи.
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
        ]);

        return redirect('/messages');
    }

    /**
     * Уничтожить заданную задачу.
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
