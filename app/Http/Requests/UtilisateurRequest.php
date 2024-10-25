<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'telephone' => ['required', 'integer', 'unique:utilisateur,telephone'],
            'adresse' => ['required', 'string', 'max:100'],
            'cni' => ['required', 'integer', 'unique:utilisateur,cni'],
            'date_naissance' => ['required', 'date', 'before:today'],
            'role' => ['required', 'string', 'in:agent,client,distributeur'],
            'photo' => ['required', 'image', 'max:2048'], // 2MB max
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'nom.max' => 'Le nom ne peut pas dépasser 50 caractères',
            
            'prenom.required' => 'Le prénom est obligatoire',
            'prenom.max' => 'Le prénom ne peut pas dépasser 50 caractères',
            
            'telephone.required' => 'Le numéro de téléphone est obligatoire',
            'telephone.integer' => 'Le numéro de téléphone doit être numérique',
            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé',
            
            'adresse.required' => 'L\'adresse est obligatoire',
            'adresse.max' => 'L\'adresse ne peut pas dépasser 100 caractères',
            
            'cni.required' => 'Le numéro CNI est obligatoire',
            'cni.integer' => 'Le numéro CNI doit être numérique',
            'cni.unique' => 'Ce numéro CNI est déjà utilisé',
            
            'date_naissance.required' => 'La date de naissance est obligatoire',
            'date_naissance.date' => 'Format de date invalide',
            'date_naissance.before' => 'La date de naissance doit être antérieure à aujourd\'hui',
            
            'role.required' => 'Le rôle est obligatoire',
            'role.in' => 'Le rôle doit être agent, client ou distributeur',
            
            'photo.required' => 'La photo est obligatoire',
            'photo.image' => 'Le fichier doit être une image',
            'photo.max' => 'La taille de l\'image ne doit pas dépasser 2MB',
            
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'password.max' => 'Le mot de passe ne peut pas dépasser 255 caractères',
        ];
    }
}