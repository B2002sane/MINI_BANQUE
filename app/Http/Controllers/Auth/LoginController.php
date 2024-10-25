<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'telephone' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirection selon le rôle
            $user = Auth::user();
            if ($user->hasRole('agent')) {
                return redirect()->route('agent.dashboard');
            } elseif ($user->hasRole('client')) {
                return redirect()->route('client.dashboard');
            } elseif ($user->hasRole('distributeur')) {
                return redirect()->route('distributeur.dashboard');
            }
        }

        return back()->withErrors([
            'telephone' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
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