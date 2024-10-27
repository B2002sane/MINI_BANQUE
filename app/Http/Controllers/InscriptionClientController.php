<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Compte;

class InscriptionClientController extends Controller
{
        /**
     * Affiche le formulaire d'inscription
     */
    public function create()
    {
        return view('inscription_client');
    }

    /**
     * Génère un numéro de compte unique
     */
    private function generateUniqueAccountNumber()
    {
        do {
            // Génère un nombre aléatoire de 10 chiffres
            $number = mt_rand(1000000, 9999999);
        } while (Compte::where('numeroCompte', $number)->exists());

        return $number;
    }

    /**
     * Gère la requête d'inscription
     */
    public function store(Request $request)
    {
      
        // Validation des données...
        // Validation des données
        $request->validate([
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'adresse' => ['required', 'string', 'max:100'],
            'cni' => ['required', 'string', 'max:255', 'unique:users'], 
            'date_naissance' => ['required', 'date'],
            'password' => ['required', 'string', 'min:6'],
            'photo' => ['nullable', 'image', 'max:2048'], // photo facultative
        ]);

        // Préparation des données
        $userData = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'cni' => $request->cni,
            'date_naissance' => $request->date_naissance,
            'role' => 'client',
            'password' => bcrypt($request->password),
           
        ];

        // Gestion de l'upload de la photo si elle existe
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $userData['photo'] = $photoPath;
        }

        // Création de l'utilisateur
        $client = Client::create($userData);
        // Création du compte associé
        $compte = new Compte([
            'id_users' => $client->id,
            'numeroCompte' => $this->generateUniqueAccountNumber(),
            'solde' => 0,
            'statut' => 1, // 1 pour actif
            
        ]);
        
        $compte->save();

        DB::commit();
        
        session()->flash('success', 'Compte créé avec succès ,veuiller vous connecter');

        // Redirection avec message de succès
        
        return view('auth/login');


    }


}
