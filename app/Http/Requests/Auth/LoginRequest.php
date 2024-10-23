<?php

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
