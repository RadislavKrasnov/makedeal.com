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

    public static function getCities($id)
    {
        $instancesCity = self::where('region_id', $id)
            ->get();

        $cities = [];

        foreach ($instancesCity as $city) {
            $cities[$city->id] = $city->name;
        }

        return $cities;
    }
}
