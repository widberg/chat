<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageWasReceived;
use App\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $room = Room::where('name', $name)->first();
        if($room != null) {
            $data = array('room' => $room);
            if ((!Auth::check() && $room->visibility == 0) || (Auth::check() && Auth::user()->canJoinRoom($room))) {
                return view("room")->with($data);
            }
            else
            {
                return response()->view("notInvited", $data, 403);
            }
        }
        else
        {
            abort(404);
        }
    }

    public function send($name)
    {
        $room = Room::where('name', $name)->first();
        if($room != null) {
            if (Auth::user()->canJoinRoom($room)) {
                $message = Input::get('message');
                Auth::user()->chatMessages()->create([
                    'room_id' => $room->id,
                    'message' => $message,
                ]);
                broadcast(new ChatMessageWasReceived(Auth::user(), $room, $message))->toOthers();
                return response()->json(['result' => 'ok']);
            }
            else
            {
                return response()->json(['result' => 'access denied'], 403);
            }
        }
        else
        {
            abort(404);
        }
    }
}
