<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Profile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = User::where('slug', $request->slug)->first();
            if (Auth::user() == $user) {
                return $next($request);
            } else {
                return redirect('/')->with('message', 'Nuk keni akses');
            }
            return redirect('/');
        }
        return redirect('/')->with('message', 'you are not login in');
    }
}
