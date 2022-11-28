<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminMiddleware
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
        if (!empty(Auth::user())) {
            $userRoles = Auth::user()->role->pluck('name')->toArray();
            $modules = Auth::user()->modules->pluck('slug')->toArray();

            switch ($userRoles) {
                case in_array('Admin', $userRoles):
                    return $next($request);
                    break;

                case in_array('Manager', $userRoles) &&
                    (Route::currentRouteName() == 'admin.dashboard' || in_array(Route::currentRouteName(), $modules)):
                    return $next($request);
                    break;

                default:
                    return redirect(RouteServiceProvider::HOME);
                    break;
            }
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
