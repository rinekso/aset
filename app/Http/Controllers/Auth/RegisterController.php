<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/subunit';

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
    protected function validator(array $data)
    {
        $data['is_subscribed'] = empty($data['is_subscribed']) ? 0 : 1;
        $data['terms'] = empty($data['terms']) ? 0 : 1;

        return Validator::make($data, [
            'role' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['is_subscribed'] = empty($data['is_subscribed']) ? 0 : 1;

        Profile::create([
            'user_id' => $data['id'],
            'nama' => $data['name'],
            'subunit_id' => $data['subunit'],
            'unit_id' => $data['unit'],
            'induk_id' => $data['induk'],
            'jabatan' => $data['role'],
        ]);

        Session::flash('success', 'User successfully created.');

        return User::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
    }
}
