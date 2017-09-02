<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\City;
use App\User;

class Region extends Model
{
    public function countries()
    {
        return $this->belongsTo('App\Country');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public static function getRegions($id)
    {
        $instancesRegion = self::where('country_id', $id)
            ->get();

        $regions = [];

        foreach ($instancesRegion as $region) {
            $regions[$region->id] = $region->name;
        }

        return $regions;
    }
}
