<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Region;
use App\User;

class City extends Model
{
    public function countries()
    {
        return $this->belongsTo('App\Country');
    }

    public function regions()
    {
        return $this->belongsTo('App\Region');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
