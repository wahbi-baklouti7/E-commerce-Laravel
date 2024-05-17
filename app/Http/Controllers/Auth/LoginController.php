<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use DragonCode\Contracts\Cashier\Auth\Auth;
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
    protected $redirectTo = '/contact';

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

        $inputs= $request->all();

        // dd(auth()->user()->role);

        if(auth()->attempt(['email' => $inputs['email'], 'password' => $inputs['password']])){

            if(auth()->user()->role == 'admin'){

                return redirect()->route('dashboard.index');
            }else{
                return redirect()->route('frontoffice.home');

            }
        }else{

            return redirect()->route('login')->with('unauthorized', 'You are unauthorized to access this page');
        }

    }
}
