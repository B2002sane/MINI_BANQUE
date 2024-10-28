<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    
    public function index()
    {
        $clients = Client::with('compte')
                         ->where('role', 'client') 
                         ->latest()
                         ->paginate(10);
    
        return view('list_client', compact('clients'));
    }
    
    public function create()
    {
        return view('form_create_client');
    }

    private function generateUniqueAccountNumber()
    {
        $length = 10; 
    
        do {
            $accountNumber = '';
            for ($i = 0; $i < $length; $i++) {
                $accountNumber .= mt_rand(0, 9);
            }
        } while (Compte::where('numeroCompte', $accountNumber)->exists());
    
        return $accountNumber;
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required',
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'telephone' => 'required|regex:/^[0-9]{9}$/|unique:users',
            'date_naissance' => 'required|date|before:-18 years',
            'adresse' => 'required|min:3',
            'cni' => 'required|string|unique:users',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|min:8'
        ]);
    
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }
        
        $validated['password'] = Hash::make($validated['password']);
    
        try {
            $client = Client::create($validated);
    
            $numeroCompte = $this->generateUniqueAccountNumber();
    
            $compte = new Compte([
                'id_users' => $client->id,
                'numeroCompte' => $numeroCompte,
                'solde' => 0,
                'statut' => 1,
            ]);
    
            $compte->save();
    
            return redirect()->route('clients.index')
                             ->with('success', 'Client créé avec succès');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()
                                 ->withInput()
                                 ->with('error', 'Le numéro de téléphone est déjà utilisé. Veuillez en choisir un autre.');
            }

            return redirect()->back()
                             ->with('error', 'Erreur lors de la création du client.');
        }
    }

    public function show(Client $client)
    {
        return view('details_client', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('form_modif_client', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'telephone' => 'required|regex:/^[0-9]{9}$/|unique:users,telephone,' . $client->id,
            'date_naissance' => 'required|date|before:-18 years',
            'adresse' => 'required|min:5',
            'cni' => 'required|regex:/^[A-Z0-9]{5,}$/|unique:users,cni,' . $client->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|min:8'
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $client->update($validated);
        if(Auth::user()->role == "client"){
            return redirect()->route('client.dashboard')
                         ->with('success', 'Client mis à jour avec succès');
        }

        return redirect()->route('clients.index')
                         ->with('success', 'Client mis à jour avec succès');
    }

    public function destroy(Client $client)
    {
        if ($client->compte) {
            $client->compte->delete();
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }

    public function bloquer($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return redirect()->back()->with('error', 'Client non trouvé.');
        }

        $client->compte->statut = 0;
        $client->compte->save();

        return redirect()->back()->with('success', 'Client bloqué avec succès.');
    }

    public function debloquer($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return redirect()->back()->with('error', 'Client non trouvé.');
        }

        $client->compte->statut = 1;
        $client->compte->save();

        return redirect()->back()->with('success', 'Client débloqué avec succès.');
    }
}
