<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
