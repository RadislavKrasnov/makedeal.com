<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Contact extends Model
{
    protected $table = 'contacts';


    protected $fillable = [
        'user_id', 'github', 'facebook', 'skype', 'google_plus', 'phone', 'portfolio',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}