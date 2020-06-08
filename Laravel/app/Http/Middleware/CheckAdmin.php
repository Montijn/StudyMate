<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('/');
        }
        $user = Auth::user();
        if ($user->role == 'Admin') {
            return $next($request);
        }
        return redirect('/');
    }
}
