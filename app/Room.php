<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name','description','visibility',
    ];

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
