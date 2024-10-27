<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Vérifie que l'utilisateur est connecté et possède le rôle requis
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Redirige vers la page de connexion ou une autre page appropriée
            return redirect()->route('login')->with('error', 'Accès non autorisé');
        }

        return $next($request);
    }
}
