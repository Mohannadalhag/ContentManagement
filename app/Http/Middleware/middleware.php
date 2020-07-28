<?php

namespace App\Http\Middleware;

use Closure;

class middleware
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
        $roleIds = [ 'editormiddleware' => 1, 'adminmiddleware' => 2];
        $allowedRoleIds = [];
        foreach ($roles as $role)
        {
           if(isset($roleIds[$role]))
           {
               $allowedRoleIds[] = $roleIds[$role];
           }
        }
        $allowedRoleIds = array_unique($allowedRoleIds); 

        if(Auth::check()) {
            if (Auth::user()->IsAdmin) {
                if(in_array(2, $allowedRoleIds)) {

                    return $next($request);
                }
            }
            if (Auth::user()->IsEditor) {
                if(in_array(1, $allowedRoleIds)) {
                    if (!($request->method=='post'||$request->method=='delete')) {
                        return $next($request);
                    }
                }
            }
        }

        return redirect('/');

    }
}
