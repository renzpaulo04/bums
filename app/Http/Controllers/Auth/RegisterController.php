<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class RegisterController extends Controller
{
    public $roleId;
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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirecTo(){
        if( Auth()->user()->role == 'USER'){
            return route('faculty.dashboard');
        }
        elseif( Auth()->user()->role == 'ADMIN'){
            return route('admin.dashboard');
        }
    }
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
            'lastName' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'middleName' => ['required', 'string', 'max:255'],
                'idNumber' =>['required','string', 'max:50', 'unique:users'],

            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contactNumber' => ['required', 'string', 'min:11','max:11'],
            'role' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    {

        $request->validate([
        'lastName' => ['required', 'string', 'max:255'],
        'firstName' => ['required', 'string', 'max:255'],
        'middleName' => ['required', 'string', 'max:255'],
        'userName' =>['required','string', 'max:50','unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      
    ]);
                $user = new User;
                $user->lastName = $request['lastName'];
                $user->firstName = $request['firstName'];
                $user->middleName = $request['middleName'];
                $user->userName = $request['userName'];
                $user->password = Hash::make($request['password']);
                $user->role = 'USER';
                $user->save();
                return redirect()->back()->with('success','you are successfully registered');

    }




}
