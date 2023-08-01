<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        // Check if the admin is logged in and trying to access the login page
        if ($request->path() === '/admin/login' && Auth::check()) {
            return redirect('/admin/dashboard');
        }

        // Check if the admin is not logged in and trying to access the dashboard
        if ($request->path() === '/adimin/dashboard' && !Auth::check()) {
            return redirect('/admin/login');
        }

        // Check if the admin is logged out and trying to access the dashboard
        if ($request->path() === '/admin/dashboard' && Auth::guest()) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
