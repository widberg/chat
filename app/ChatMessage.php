<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = [
        'user_id','room_id','message',
    ];

    public function sender()
    {
        return $this->belongsTo('App\User');
    }

    public function room()
    {
        return $this-belongsTo('App\Room');
    }
}
