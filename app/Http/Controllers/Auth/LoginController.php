<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
//my code
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:191|',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            // Authentication passed...
            $id = Auth::id();
            return redirect()->intended("/user/$id");
        }

        return back()->withInput($request->only('username', 'password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
}
