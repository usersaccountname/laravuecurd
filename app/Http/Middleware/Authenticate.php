<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return null;
        }

        $guard = $this->getGuard($request);

        switch ($guard) {
            case 'students':
                return route('slogin');
            case 'instructors':
                return route('ilogin');
            case 'directors':
                return route('dlogin');
            default:
                // // return route('login');
                return route('dlogin');
                // return route('slogin');
        }
    }

    protected function getGuard(Request $request): string
    {
        $route = $request->route();

        if ($route && $route->getName()) {
            $segments = explode('.', $route->getName());

            // The guard is the first segment of the route name
            return $segments[1] ?? 'web'; // Adjust the index if needed
        }

        return 'web'; // Default guard (web) if unable to determine
    }
}
