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
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
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

    // Redirection en cas d'échec de l'authentification
    return back()->withErrors([
        'telephone' => 'Numero ou mot de passe incorrecte.',
    ]);
}
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}