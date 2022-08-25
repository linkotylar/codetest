<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckRoutePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role_id = Auth::user()->role_id;
        $method = $request->method();
        // dd($method);
        $main = $request->segment(1);
        $second = $request->segment(2);
        $third = $request->segment(3);

        $check = \App\Utility::checkPermission($role_id, $main, $second, $third, $method);

        if($check) {
            return $next($request);
        }

        return redirect('/dashboards');
        
    }
}
