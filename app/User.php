<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Project;
use App\Technology;
use App\Company;
use App\City;
use App\Region;
use App\Country;
use App\Contact;
use App\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function technologies()
    {
        return $this->belongsToMany('App\Technology');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }

    public function countries()
    {
        return $this->belongsTo('App\Country', 'countries_id');
    }

    public function regions()
    {
        return $this->belongsTo('App\Region');
    }

    public function cities()
    {
        return $this->belongsTo('App\City');
    }

    public function jobs()
    {
        return $this->belongsTo('App\Job');
    }

    public function contacts()
    {
        return $this->hasOne('App\Contact');
    }



//retrieve technologies by each user
    public function scopeUserTechnologies($query)
    {
      $techArray = DB::table('technology_user')->select('technology_id')
        ->where('user_id', '=', $this->getAttribute('id'))->get();

      $techId = [];

      foreach ($techArray as $id) {
          $techId[] = $id->technology_id;
      }

      return $userTechs = Technology::select('id', 'title')->whereIn('id', $techId)->get();

    }

    public function scopeSpecialization($query)
    {
        return $job = Job::select('title')->where('id', '=', $this->getAttribute('jobs_id'))
            ->get();
    }

    public function scopeCount($query)
    {
        return $country = Country::select('name')->where('id', '=', $this->getAttribute('countries_id'))
            ->get();
    }

    public function scopeReg($query)
    {
        return $reg = Region::select('name')->where('id', '=', $this->getAttribute('regions_id'))
            ->get();
    }

    public function scopeCit($query)
    {
        return $cit = City::select('name')->where('id', '=', $this->getAttribute('cities_id'))
            ->get();
    }

    public function scopeContact()
    {
        return $contact = Contact::select('*')
            ->where('user_id', '=', $this->getAttribute('id'))
            ->get();
    }
}
