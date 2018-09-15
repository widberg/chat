<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Room;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function chatMessages()
    {
        return $this->hasMany('App\ChatMessage');
    }

    public function canJoinRoom(Room $room)
    {
        if ($room->visibility == 0 || $room->visibility == 1) {
            return true;
        }
        elseif ($room->visibility == 2)
        {
            if($this->rooms->contains($room->id))
            {
                return true;
            }
        }
        return false;
    }
}
