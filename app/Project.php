<?php

namespace App;
use App\User;
use App\Technology;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function technologies()
    {
        return $this->belongsToMany('App\Technology');
    }

}
