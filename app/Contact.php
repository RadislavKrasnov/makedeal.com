<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Contact extends Model
{
    public function users()
    {
        return $this->hasOne('App\User');
    }
}
