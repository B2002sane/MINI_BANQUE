<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    public function retrait(Request $request)
    {
        // Validation des champs du formulaire
        $validated = $request->validate([
            'telephone' => ['required', 'regex:/^[0-9]{9}$/'],
            'montant' => ['required', 'integer', 'min:500'],
        ]);

        // Récupérer le client par téléphone
        $user = User::where('telephone', $validated['telephone'])->first();
        $dtb = User::where('role', 'distributeur')->first();

        if (!$user) {
            return back()->withErrors(['telephone' => 'Client non trouvé.']);
        }

        // Récupérer le compte du client
        $compte = Compte::where('id_users', $user->id)->first();
        $compteD = Compte::where('id_users', $dtb->id)->first();

        if (!$compte) {
            return back()->withErrors(['compte' => 'Compte introuvable.']);
        }

        $montant = $validated['montant'];
        $frais = $montant * 0.01; // Calcul des frais de 1%
        $montantTotal = $montant + $frais;

        // Vérification du solde suffisant
        if ($compte->solde < $montantTotal) {
            return back()->withErrors(['montant' => 'Solde insuffisant pour ce retrait.']);
        }

        // Déduire le montant du solde
        $compte->solde -= $montantTotal;
        $compteD->solde = $compteD->solde - $montant + $frais;
        $compte->save();
        $compteD->save();

        // Enregistrer la transaction
        Transaction::create([
            'id_users' => $user->id,
            'montant' => $montant,
            'type' => 'retrait',
            'status' => 1,
            'frais' => $frais,
        ]);

        // Retourner un message de succès
        return redirect()->back()->with('success', 'Retrait effectué avec succès.');
    }

    public function index()
    {
        return view('retrait');  // Fichier retrait.blade.php dans resources/views
    }
}
