<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class adminmiddleware
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
        $user = Auth::user()->IsAdmin;
        if ($user){
            return $next($request);
        }
        return redirect('home');
    }
}
