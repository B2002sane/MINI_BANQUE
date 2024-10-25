<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('list_client', compact('clients'));
    }

    public function create()
    {
        return view('form_create_client');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required',
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'telephone' => 'required|regex:/^[0-9]{8,}$/',  // Changé de numero à telephone
            'date_naissance' => 'required|date|before:-18 years',
            'adresse' => 'required|min:3',
            'cni' => 'required|string|unique:users',  // Simplifié la validation de CNI
            'photo' => 'required|string',  // Adapté pour accepter le nom du fichier
            'password' => 'required|min:8'
        ]);
    
        // Hasher le mot de passe
        $validated['password'] = Hash::make($validated['password']);
    
        // Créer le client
        Client::create($validated);
    
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
        return view('clients.edit', compact('client'));
    }



    //******************************************************************** */


    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'numero' => 'required|regex:/^[0-9+]{8,}$/',
            'date_naissance' => 'required|date|before:-18 years',
            'adresse' => 'required|min:5',
            'cni' => 'required|regex:/^[A-Z0-9]{5,}$/|unique:clients,cni,' . $client->id,
            'photo' => 'nullable|image|max:2048',
            'mot_de_passe' => 'nullable|min:8'
        ]);

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($client->photo) {
                Storage::disk('public')->delete($client->photo);
            }
            $photoPath = $request->file('photo')->store('photos_clients', 'public');
            $validated['photo'] = $photoPath;
        }

        if (isset($validated['mot_de_passe'])) {
            $validated['mot_de_passe'] = Hash::make($validated['mot_de_passe']);
        } else {
            unset($validated['mot_de_passe']);
        }

        $client->update($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client mis à jour avec succès');
    }


//************************************************************************************* */

    public function destroy(Client $client)
    {
        if ($client->photo) {
            Storage::disk('public')->delete($client->photo);
        }
        
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client supprimé avec succès');
    }


}
