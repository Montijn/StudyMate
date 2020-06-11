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
            return redirect('/')->with('failed-login', 'U heeft geen toegang tot deze pagina, log eerst in');
        }
        $user = Auth::user();
        if ($user->role == 'Admin') {
            return $next($request);
        }
        return redirect('/')->with('failed-access', 'U heeft geen toegang tot deze pagina');
    }
}
