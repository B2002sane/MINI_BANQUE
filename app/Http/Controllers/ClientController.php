<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    
    public function index()
    {
        // Récupération des clients avec leurs comptes associés, paginés,
        // en filtrant par rôle 'client'
        $clients = Client::with('compte')
                         ->where('role', 'client') 
                         ->latest()
                         ->paginate(10);
    
        // Retourner la vue avec les clients paginés
        return view('list_client', compact('clients'));
    }
    
    

    public function create()
    {
        return view('form_create_client');
    }



    private function generateUniqueAccountNumber()
    {
        $length = 10; // Longueur du numéro de compte 
    
        do {
            // Générer un numéro aléatoire de 10 chiffres
            $accountNumber = '';
            for ($i = 0; $i < $length; $i++) {
                $accountNumber .= mt_rand(0, 9); // Ajoute un chiffre aléatoire
            }
        } while (Compte::where('numeroCompte', $accountNumber)->exists()); // Vérifie si le numéro existe déjà
    
        return $accountNumber; // Retourne le numéro unique
    }
    


    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required',
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'telephone' => 'required|regex:/^[0-9]{9}$/',
            'date_naissance' => 'required|date|before:-18 years',
            'adresse' => 'required|min:3',
            'cni' => 'required|string|unique:users',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|min:8'
        ]);
    
        
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }
        // Hasher le mot de passe
        $validated['password'] = Hash::make($validated['password']);
    
        // Créer le client
        $client = Client::create($validated);
    
        // Générer un numéro de compte unique
        $numeroCompte = $this->generateUniqueAccountNumber();
    
        // Création du compte associé
        $compte = new Compte([
            'id_users' => $client->id, // Utilisez l'ID du client nouvellement créé
            'numeroCompte' => $numeroCompte, // Assurez-vous que le numéro de compte est bien généré
            'solde' => 0,
            'statut' => 1,
        ]);
    
        $compte->save(); // Sauvegarde le compte en base de données
    
        return redirect()->route('clients.index')
                         ->with('success', 'Client créé avec succès');
    }
    




    //*************************************************************************  */


    public function show(Client $client)
    {
        return view('details_client', compact('client'));
    }



    //************************************************************************ */

    public function edit(Client $client)
    {
        return view('form_modif_client', compact('client'));
    }



    //******************************************************************** */


    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'numero' => 'required|regex:/^[0-9+]{9}$/',
            'date_naissance' => 'required|date|before:-18 years',
            'adresse' => 'required|min:5',
            'cni' => 'required|regex:/^[A-Z0-9]{5,}$/|unique:users,cni,' . $client->id,
            'photo' => 'required|string',
            'password' => 'required|min:8'
        ]);

        dd($validated);

        $client->update($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client mis à jour avec succès');
    }


//************************************************************************************* */



   // ClientController.php
   public function destroy(Client $client)
    {
    // Vérifiez si le client a un compte associé
    if ($client->compte) {
        // Supprimez le compte
        $client->compte->delete();
    }

    // Supprimez le client
    $client->delete();

    return redirect()->route('clients.index')->with('success', 'Client  supprimés avec succès.');

}

//******************************************************************************************************* */


public function bloquer($id)
    {
        // Rechercher le client par son ID
        $client = Client::find($id);

        // Vérifier si le client existe
        if (!$client) {
            return redirect()->back()->with('error', 'Client non trouvé.');
        }

        // Mettre à jour le statut du compte
        $client->compte->statut = 0; // Supposons que la relation est définie et que 'compte' est la relation avec le modèle Compte
        $client->compte->save();

        // Retourner un message de succès
        return redirect()->back()->with('success', 'Client bloqué avec succès.');
    }

    public function debloquer($id)
    {
        // Rechercher le client par son ID
        $client = Client::find($id);

        // Vérifier si le client existe
        if (!$client) {
            return redirect()->back()->with('error', 'Client non trouvé.');
        }

        // Mettre à jour le statut du compte
        $client->compte->statut = 1; // Supposons que la relation est définie et que 'compte' est la relation avec le modèle Compte
        $client->compte->save();

        // Retourner un message de succès
        return redirect()->back()->with('success', 'Client debloqué avec succès.');
    }


}
