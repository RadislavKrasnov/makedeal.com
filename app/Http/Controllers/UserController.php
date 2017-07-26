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

    public function projectForm(Request $request)
    {
        $user = User::find($request->input('user_id'));

        return view('project', ['user' => $user]);
    }

    public function addProject(Request $request)
    {
        $userId = $request->input('user_id');
        $title = htmlspecialchars($request->input('title'));
        $description = htmlspecialchars($request->input('description'));
//        $completed = $request->input('completed');
//        $date = preg_match('/(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])\-(19|20)\d\d/', $completed);


//
        $completed = strtotime($request->input('completed'));
        $date = date('Y-d-m', $completed);
//        preg_match('/(19|20)\d\d\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/', $completed, $matches);

            if (!empty($userId) && !empty($title) && !empty($description)) {
            $id = DB::table('projects')->insertGetId(
                ['title' => $title, 'description' => $description, 'completed' => $date]
            );


            DB::table('project_user')->insert([
                ['project_id' => $id, 'user_id' => $userId],
                ]);

            return redirect()->route('profile', [$userId]);




        } else {
            return redirect()->route('developers');
        }

    }

    public function projectDelete(Request $request)
    {
        $userId = $request->input('user_id');
        $projectId = $request->input('project_id');

        DB::table('project_user')->where('project_id', '=', $projectId)->delete();

        Project::destroy($projectId);

        return redirect()->route('profile', [$userId]);
    }
}
