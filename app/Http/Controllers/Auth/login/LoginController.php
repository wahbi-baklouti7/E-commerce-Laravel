<?php

namespace App\Http\Controllers\Auth\login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\login\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //


    public function show(){

        return view('backoffice.auth.login.show');
    }


    public function login(LoginRequest $request){

        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
    }


}
