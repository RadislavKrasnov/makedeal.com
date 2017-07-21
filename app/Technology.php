<?php

namespace App;

use App\User;
use App\Project;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
}
