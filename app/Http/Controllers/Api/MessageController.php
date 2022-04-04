<?php

namespace App\Http\Controllers\Api;

use App\Events\Chat\SendMessage;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class MessageController extends Controller
{
    public function index(User $user)
    {
        $userFrom = Auth::user()->id;
        $userTo = $user->id;

        $messages = Message::where(
            function($query) use ($userFrom, $userTo){
                $query->where([
                    'from' => $userFrom,
                    'to' => $userTo
                ]);
            }
        )->orWhere(
            function($query) use ($userFrom, $userTo){
                $query->where([
                    'to' => $userFrom,
                    'from' => $userTo
                ]);
            }
        )->orderBy('created_at', 'ASC')->get();

        return response([
            'messages' => $messages
        ],200);
    }

    public function store(Request $request)
    {
        $message = New Message();
        $message->from = Auth::user()->id;
        $message->to = $request->to;
        $message->content = $request->content;
        $message->save();

        Event::dispatch(new SendMessage($message, $request->to));
    }

}
