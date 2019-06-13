<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    // public function login(Request $request){
    //     $credentials = ['email' => $request->email, 'password' => $request->password];
    //     if(Auth::attempt($credentials)){
    //         return redirect('/');
    //     }
    //     //$throttles = $this->isUsingThrottlesLoginsTrait();
    //     //dd(Auth::guard('location')->attempt($credentials, $request->has('remember')));
    //     if (Auth::guard('location')->attempt($credentials, $request->has('remember'))) {
    //         return $this->handleUserWasAuthenticated($request, array());
    //     }
    //     //Auth::guard('location')->attempt($credentials);
    //     //return redirect('/');
    // }
    
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

    protected function authenticated(Request $request, $user) {
        if ($user->user_role == 1) {
            return redirect('/');
        } else if ($user->user_role == 2 || $user->user_role == 3) {
            return redirect('/reports');
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
        // if (Auth::guard('location')->attempt($credentials, $request->has('remember'))) {
        //     return $this->handleUserWasAuthenticated($request, $throttles);
        // }
        //$this->middleware('guest:user')->except('logout');
        //$this->middleware('guest:location')->except('logout');
        
    }
}
