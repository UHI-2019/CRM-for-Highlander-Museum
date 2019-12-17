<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

use Closure;

class IsSuperuserOrGuest
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
        if(Auth::user()) {
            $roleId = Config::get('roles.SUPERUSER');
        }

        if ((!Auth::check()) || (Auth::user()->role_id = $roleId)) {
            return $next($request);
        }
        return redirect('/home');
    }
}
