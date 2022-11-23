<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure, Auth;
use Illuminate\Http\Request;

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
            $userRole = Auth::user()->role[0]->name;
            
            switch ($userRole) {
                case 'Admin':
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
