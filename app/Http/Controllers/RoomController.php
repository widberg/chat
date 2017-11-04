<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Illuminate\Support\Facades\Auth;

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
            if ($room->visibility == 0 || $room->visibility == 1) {
                return view("room")->with($data);
            } elseif ($room->visibility == 2) {
                if(Auth::user()->rooms->contains($room->id)){
                    return view("room")->with($data);
                }else{
                    return view("notInvited")->with($data);
                }
            }
        }else{
            abort(404);
        }
    }
}
