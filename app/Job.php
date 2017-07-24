<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Job extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
