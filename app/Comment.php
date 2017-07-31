<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;

class Comment extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
}
