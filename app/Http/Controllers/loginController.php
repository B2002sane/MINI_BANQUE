<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  // Affiche le formulaire de connexion (à créer)
    }

    public function login(Request $request)
    {
        // Validation des données de connexion
        $credentials = $request->validate([
            'telephone' => 'required|integer',
            'password' => 'required',
        ]);

        // Tentative d'authentification
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirection basée sur le rôle de l'utilisateur
            $user = Auth::user();
            switch ($user->role) {
                case 'agent':
                    return redirect()->route('agent.dashboard');
                case 'client':
                    return redirect()->route('client.dashboard');
                case 'distributeur':
                    return redirect()->route('distributeur.dashboard');
            }
        }

        // Retour en arrière avec un message d'erreur si la connexion échoue
        return back()->withErrors([
            'telephone' => 'Les identifiants fournis sont incorrects.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

