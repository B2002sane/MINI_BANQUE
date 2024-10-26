<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginRequest extends FormRequest
{
    /**
     * Définissez les règles de validation
     */
    public function rules(): array
    {
        return [
            'telephone' => ['required', 'numeric'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Authentification de l'utilisateur avec le numéro de téléphone.
     */
    public function authenticate(): void
    {
        // Tentative d'authentification avec le numéro de téléphone
        if (!Auth::attempt(['telephone' => $this->input('telephone'), 'password' => $this->input('password')])) {
            throw ValidationException::withMessages([
                'telephone' => __('Les informations de connexion sont incorrectes.'),
            ]);
        }
    }
}
