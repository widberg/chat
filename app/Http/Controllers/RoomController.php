<?php

namespace App\Http\Controllers;

use App\Room;

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
        $data = array('room' => Room::where('name', $name)->first());
        return view("room")->with($data);
    }
}
