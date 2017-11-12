<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

use App\Room;

Broadcast::channel('room.{roomId}', function ($user, Room $roomId) {
    if ($user->canJoinRoom($roomId)) {
        return ['id' => $user->id, 'username' => $user->username];
    }
});
