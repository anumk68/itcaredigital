<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuth
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Redirect to your desired route if not authenticated
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
?>
