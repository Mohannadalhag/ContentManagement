<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class editormiddleware
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
        $user = Auth::user()->IsEditor;
        if ($user){
            return $next($request);
        }
        return redirect('home');
    }
}
