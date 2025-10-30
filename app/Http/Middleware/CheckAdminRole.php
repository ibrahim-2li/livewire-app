<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Check if user is authenticated as admin
        if (!auth('admin')->check()) {
            return redirect()->route('admin.login');
        }

        $user = auth('admin')->user();

        // Check if user has any of the required roles
        if (!in_array($user->role, $roles)) {
            abort(403, 'Access denied. Insufficient permissions.');
        }

        return $next($request);
    }
}
