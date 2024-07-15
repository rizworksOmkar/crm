<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    
    // public function redirectTo()
    // {
    //    if(auth()->user()->role_type == 'admin'){           
    //         return '/landing-page';
    //     }else if (auth()->user()->role_type == 'user') {
    //         if (auth()->user()->email_verified_flag == 1) {
    //             return '/user/dashboard';
    //         } else {
    //             Auth::logout();
    //             return false;
                
    //         }
    //     }else {
    //        return response()->view('unauthorized', [], 401);
    //     }
    // }

    public function authenticated()
    {
       if(auth()->user()->role_type == 'superadmin'){                     
            return redirect('/Superadmin-landing-page');
        }elseif(auth()->user()->role_type == 'admin'){                     
            return redirect('/landing-page');
        }else if (auth()->user()->role_type == 'user') {
            if (auth()->user()->email_verified_flag == 1) {
                return redirect('/user-dashboard');
                //return '/user/dashboard';
                //return redirect()->back()->with('status','You are Loged in successfully');
            } else {
                Auth::logout();
                return false;
                
            }
        }else {
           return response()->view('unauthorized', [], 401);
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
        //echo "sdfs";die;
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
    
    public function showLoginForm(Request $request) {
        return redirect('/');
    }
   
}
