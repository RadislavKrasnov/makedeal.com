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
use Illuminate\Support\Facades\DB;

class TechnologyController extends Controller
{
    public function removeTechnology(Request $request)
    {
        $userId = $request->input('user_id');
        $techId = $request->input('tech_id');

        $user = User::find($userId);
        $user->technologies()->detach($techId);
        return redirect()->route('profile', [$userId]);
    }

    public function addTechnology(Request $request)
    {
        $userId = $request->input('user_id');
        $techIds = $request->input('techIds');

        $user = User::find($userId);
        $user->technologies()->attach($techIds);
        return redirect()->route('profile', [$userId]);
    }
}
