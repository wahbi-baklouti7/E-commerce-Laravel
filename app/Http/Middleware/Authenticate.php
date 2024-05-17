<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if($request->expectsJson()) {

           
            return null;
        }

        Session::flash('error', 'You need to login first!');
        return route('frontoffice.loginRegister');
        // return route('login');
    }


}
