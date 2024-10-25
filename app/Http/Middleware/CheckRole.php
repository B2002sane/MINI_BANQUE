<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, string $role)
    {
        if (!$request->user() || $request->user()->role !== $role) {
            if ($request->user()) {
                // Rediriger vers le dashboard approprié de l'utilisateur
                return redirect()->route($request->user()->getDashboardRoute());
            }
            return redirect()->route('login');
        }

        return $next($request);
    }
}
