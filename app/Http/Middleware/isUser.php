<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $isAdmin = Auth::user()->is_admin;

        if ($isAdmin == 1) {
            return $next($request);
            // return redirect(route('frontend.home'));
        }
        Route::view('/notaccess', 'notaccess');

    }
}
