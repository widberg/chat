<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Traits\RegistersRooms;

class RegisterRoomController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Room Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the creation of new rooms as well as their
    | validation and registration. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersRooms;

    /**
     * Where to redirect users after creation.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming creation request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:20|regex:/^[0-9a-zA-Z\-_]+$/|unique:rooms',
            'description' => 'required|string|max:256',
            'visibility' => 'required|min:0|max:2',
            'g-recaptcha-response' => 'required|recaptcha',
        ],
        [
            'name.regex' => 'Room names can only contain numbers, letters, and the characters "-" or "_".',
            'g-recaptcha-response.required' => 'The captcha is required.',
        ]);
    }

    /**
     * Create a new room instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Room
     */
    protected function create(array $data)
    {
        return Room::create([
            'user_id' => Auth::id(),
            'name' => $data['name'],
            'description' => $data['description'],
            'visibility' => $data['visibility'],
        ]);
    }
}
