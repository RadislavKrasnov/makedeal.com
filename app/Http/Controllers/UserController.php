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

    public function profile(Request $request, $id)
    {
        session(['user_id' => Auth::id()]);
        $session = session('user_id');
        $user = User::find($id);
        $comments = Comment::where('page_id', '=', $id)->get();
        $replies = Reply::where('page_id', '=', $id)->get();
        return view('profile', compact('user', 'comments', 'replies', 'session'));
    }
}
