<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:45'],
            'mname' => ['required', 'string', 'max:45'],
            'lname' => ['required', 'string', 'max:45'],
            'email' => ['required', 'string', 'email', 'max:65', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $new_user = new User;
        $new_user->fname = $request->input('fname');
        $new_user->mname = $request->input('mname');
        $new_user->lname = $request->input('lname');
        $new_user->email = $request->input('email');
        $new_user->role_id = 2;
        $new_user->password = Hash::make($request->input('password'));
        $new_user->save();
        return redirect()->back();
    }
}
