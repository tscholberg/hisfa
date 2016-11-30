<?php

namespace App\Http\Middleware;

use Closure;

class PermissionIsAdmin
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
        if($user->admin == false){
            return redirect('/noaccess');
        }
        return $next($request);
    }
}
