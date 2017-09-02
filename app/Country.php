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

    public function scopeGetCountries()
    {
        $instancesCountry = self::all();

        $countries = [];

        foreach ($instancesCountry as $country) {
            $countries[$country->id] = $country->name;
        }

        return $countries;
    }
}
