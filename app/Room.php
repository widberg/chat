<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'user_id','name','description','visibility',
    ];

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
