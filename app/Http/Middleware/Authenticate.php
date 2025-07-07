<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login'); // Change to your login route
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard($guards)->guest()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
