<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
use Auth;

class LoginController extends Controller
{

    //use ThrottlesLogins;

    public function __construct()
    {

        //$this->middleware('guest')->except('logout');
        
    }

    // public function login(Request $request){
    //     //dd($request->has('remember'));
    //     $credentials = ['email' => $request->email, 'password' => $request->password];
    //     if(Auth::attempt($credentials))
    //         return redirect('/');

    //         //$throttles = $this->isUsingThrottlesLoginsTrait();
    //     //$throttles = $this->isUsingThrottlesLoginsTrait();
    //     //dd(Auth::guard('location')->attempt($credentials, $request->has('remember')));
    //     if(Auth::guard('location')->attempt($credentials, true)){
    //         //$request->session->put('location', $request->email);
    //         $credentials = ['email' => 'location@gmail.com', 'password' => 'tire'];
    //         if(Auth::attempt($credentials))
    //             return redirect('/');
    //     }
    //         //dd(Auth::guard('location'));
    //         //return $this->handleUserWasAuthenticated($request, $throttles);
    //         //return redirect('/');
    //     //dd(Auth::guard('location'));
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
        } elseif ($user->user_role == 4) {
            return redirect('/report/add');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
}
