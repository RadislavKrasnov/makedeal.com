<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Job;
use App\Country;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }*/

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'username' => 'required|string|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'birthday' => 'string',
            'experience' => 'required|string',
            'jobs_id' => 'required|numeric',
            'country' => 'required|numeric',
            'region' => 'required|numeric',
            'city' => 'required|numeric',
            'email' => 'required|string|email|max:191|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'birthday' => $data['birthday'],
            'experience' => $data['experience'],
            'jobs_id' => intval($data['jobs_id']),
            'countries_id' => intval($data['country']),
            'regions_id' => intval($data['region']),
            'cities_id' => intval($data['city']),
            'email' => $data['email'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        $id = Auth::id();
        return $this->registered($request, $user)
            ?: redirect()->route('profile', [$id]);
    }

    public function showRegistrationForm()
    {
        //Specializations
        $jobs = Job::specializationsArray();
        $jobsArray = json_decode(json_encode($jobs), true);

        //countries
        $countries = Country::getCountries();
        $countriesArray = json_decode(json_encode($countries), true);

        return view('auth.register', compact('jobsArray', 'countriesArray'));
    }
}
