<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;

trait RegistersRooms
{
    use RegistersRooms;
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('registerRoom');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $room = $this->create($request->all());

        return $this->registered($request, $room)
            ?: redirect($this->redirectPath() . $room->name . '/');
    }

    /**
     * The room has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $room)
    {
        //
    }
}
