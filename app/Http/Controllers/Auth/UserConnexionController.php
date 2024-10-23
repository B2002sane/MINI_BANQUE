<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserConnexionController extends Controller
{
    /**
     * Affiche la vue de connexion.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; // Ajoute cette ligne

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser toutes les requêtes
    }

    public function rules()
    {
        return [
            'phone' => 'required|string|size:10|regex:/^[0-9]+$/', // Vérifie que le numéro de téléphone a exactement 10 chiffres
            'password' => 'required|string|min:6', // Vérifie que le mot de passe a au moins 6 caractères
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.size' => 'Le numéro de téléphone doit contenir exactement 9 chiffres.',
            'phone.regex' => 'Le numéro de téléphone ne doit contenir que des chiffres.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ];
    }

    public function authenticate()
    {
        // Vérifie si les informations d'identification sont correctes
        if (!Auth::attempt($this->only('phone', 'password'))) {
            // Si l'authentification échoue, déclenche une erreur de validation
            throw ValidationException::withMessages([
                'phone' => ['Les informations d\'identification fournies sont incorrectes.'],
            ]);
        }
    }
}

     * Gère une requête d'authentification entrante.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authentification avec le numéro de téléphone et le mot de passe
        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            // Régénérer la session pour éviter la fixation de session
            $request->session()->regenerate();

            // Rediriger vers le tableau de bord ou une autre page
            return redirect()->intended('/dashboard'); // Change cette route selon ta configuration
        }

        // Si l'authentification échoue, renvoie les erreurs
        return back()->withErrors([
            'phone' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    /**
     * Déconnecte une session authentifiée.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        // Rediriger vers la page d'accueil ou une autre page
        return redirect('/'); // Change cette route selon ta configuration
    }
}
