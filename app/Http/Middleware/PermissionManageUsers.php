<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PermissionManageUsers
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
        $user = $request->user();
        if($user->manage_users == false){
            return redirect('/noaccess');
        }
        return $next($request);
    }
}
