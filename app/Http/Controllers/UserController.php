<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('developers', compact('users'));
    }
}
