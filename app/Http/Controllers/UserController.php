<?php

namespace App\Http\Controllers;

use App\Reply;
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
use App\Comment;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(5);
        return view('developers', compact('users'));
    }

    private function calculate_term($birthday) {
        $birthday_timestamp = strtotime($birthday);
        $age = date('Y') - date('Y', $birthday_timestamp);
        if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
        }
        return $age;
    }

    public function profile($id)
    {


        session(['user_id' => Auth::id()]);
        $session = session('user_id');
        $user = User::find($id);
        $user->birthday = $this->calculate_term($user->birthday);
        $user->experience = $this->calculate_term($user->experience);
        $comments = Comment::where('page_id', '=', $id)->get();
        $replies = Reply::where('page_id', '=', $id)->get();
        return view('profile', compact('user', 'comments', 'replies', 'session'));
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'specialization' => 'string',
            'birthday' => 'string',
            'experience' => 'string',
        ]);

        User::updateOrCreate(
            ['id' => $request->input('user_id')],
            [
                'jobs_id' => htmlspecialchars($request->input('specialization')),
                'birthday' => htmlspecialchars($request->input('birthday')),
                'experience' => htmlspecialchars($request->input('experience')),
            ]
        );

        return redirect()->route('profile', [$request->input('user_id')]);
    }
}
