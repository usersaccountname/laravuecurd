<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the 'student' role
        if (auth()->check() && auth()->user()->hasRole('student')) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        return redirect('/')->with('error', 'Unauthorized access');
    }
}
