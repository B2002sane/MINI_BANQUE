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
     * Gère la requête de connexion.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authentification de l'utilisateur avec le numéro de téléphone et le mot de passe
        $request->authenticate();

        // Régénérer la session pour éviter la fixation de session
        $request->session()->regenerate();

        // Redirige vers le tableau de bord ou la page prévue
        return redirect()->intended(route('dashboard'));
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
