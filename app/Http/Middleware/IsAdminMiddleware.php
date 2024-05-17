<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // dd(Auth::user()->role);

        if(Auth::check()){

            return redirect()->route('error.404');
        }
        if(Auth::user()->role == 'admin'){
        return $next($request);
    }
    return redirect()->back()->with('unauthorized', 'You are unauthorized to access this page');
}
}
