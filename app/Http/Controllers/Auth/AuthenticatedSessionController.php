<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Affiche la vue de connexion.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Gère une demande d'authentification entrante.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authentifie l'utilisateur
        $request->authenticate();

        // Régénère la session pour éviter les attaques de fixation de session
        $request->session()->regenerate();

        // Récupère le rôle de l'utilisateur authentifié
        $role = Auth::user()->role;

        // Redirige en fonction du rôle de l'utilisateur
        switch ($role) {
            case 'client':
                return redirect()->route('client');
            case 'distributeur':
                return redirect()->route('distributeur');
            case 'agent':
                return redirect()->route('agent');
            default:
                return redirect()->route('dashboard'); // Route par défaut si le rôle n'est pas reconnu
        }
    }

    /**
     * Déconnecte l'utilisateur authentifié et détruit la session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
