<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Technology;
use App\Company;
use App\City;
use App\Region;
use App\Country;
use App\Contact;
use App\Job;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('developers', compact('users'));
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('profile', compact('user'));
    }
}
