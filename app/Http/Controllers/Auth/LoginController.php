<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

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
    protected $redirectTo = RouteServiceProvider::HOME;
        protected function redirecTo(){
            if( Auth()->user()->role == 'ADMIN'){
                return route('admin.dashboard');
            }

            elseif( Auth()->user()->role == 'USER'){
                return route('user.dashboard');
            }
        }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'userName' => 'required',
            'password' => 'required',

        ]);
       $user = User::where('userName', array($input['userName']))->count();
        if ( $user != 0){
                if ( auth()->attempt(array('userName'=>$input['userName'],'password'=>$input['password']))){
                    if( auth()->user()->role == 'USER')
                    {
                            return redirect()->route('user.dashboard');
                    }
                    elseif( auth()->user()->role == 'ADMIN'){
                        return redirect()->route('admin.dashboard');
                    }
                }else{
                    return redirect()->route('login')->with('error','Password Incorrect');
                }

        }else{
            return redirect()->route('login')->with('error','Your Id Number Not a member');
        }
    }
}
