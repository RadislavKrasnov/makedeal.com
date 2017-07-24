<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\Region;
use App\User;

class Country extends Model
{
    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function regions()
    {
        return $this->hasMany('App\Region');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
