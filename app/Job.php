<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function scopeSpecializationsArray()
    {
        $specializationsArray = self::all();

        $specializations = [];

        foreach ($specializationsArray as $specialization) {
            $specializations[$specialization->id] = $specialization->title;
        }

        return $specializations;
    }
}
