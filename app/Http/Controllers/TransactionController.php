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
            return back()->withErrors(['telephone' => 'Compte introuvable.']);
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
            'expediteur' => $dtb->id,
        ]);



        // Retourner un message de succès
        return redirect()->back()->with('success', 'Retrait effectué avec succès.');
    }

    public function transfert(Request $request){
         // Validation des champs du formulaire
         $validated = $request->validate([
            'telephone' => ['required', 'regex:/^[0-9]{9}$/'],
            'montant' => ['required', 'integer', 'min:50'],
        ]);

        // Récupérer le client par téléphone
        $user = User::where('telephone', $validated['telephone'])->first();
        $user2 = User::where('telephone', 782416550)->first();

        if(!$user){
            return to_route('transfert')->withErrors(['telephone' => 'Ne dispose pas de compte'])->onlyinput('telephone');
        }

        $compteD = Compte::where('id_users', $user->id)->first();
        $compteE = Compte::where('id_users', $user2->id)->first();

        if (!$compteD && $user->role !== 'client') {
            return back()->withErrors(['telephone' => 'Compte introuvable.'])->withinput('telephone', 'montant');
        }

        if($compteD->statut === 0){
            return to_route('transfert')->withErrors(['telephone' => 'Compte bloqué'])->onlyinput('telephone');
        }

        $montantRecu = $validated['montant'];
        $frais = $montantRecu * 0.02; // Calcul des frais de 2%
        $montantEnvoye= $montantRecu + $frais;

        if($compteE->solde < $montantEnvoye){
            return back()->withErrors(['montant' => 'Solde insuffisant pour effectuer ce transfert']);
        }

        $compteD->solde += $montantRecu;
        $compteE->solde -= $montantEnvoye;

        $compteE->save();
        $compteD->save();

        // Enregistrer la transaction
        Transaction::create([
            'id_users' => $user->id,
            'montant' => $montantRecu,
            'type' => 'transfert',
            'status' => 1,
            'frais' => $frais,
            'expediteur' => $user2->id,
        ]);


        // Retourner un message de succès
        return redirect()->back()->with('success', 'transfert effectué avec succès.');
    }

    public function depot(Request $request)
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
            return back()->withErrors(['telephone' => 'Compte introuvable.']);
        }

        $montant = $validated['montant'];
        $frais = $montant * 0.01; // Calcul des frais de 1%
        $montantTotal = $montant - $frais;

        

        // Déduire le montant du solde
        $compte->solde += $montantTotal;
        $compteD->solde = $compteD->solde - $montant + $frais;
        $compte->save();
        $compteD->save();

        // Enregistrer la transaction
        Transaction::create([
            'id_users' => $user->id,
            'montant' => $montant,
            'type' => 'depot',
            'status' => 1,
            'frais' => $frais,
            'expediteur' => $dtb->id,
        ]);

        // Retourner un message de succès
        return redirect()->back()->with('success', 'depot effectué avec succès.');
    }

    public function index()
    {
        return view('retrait');  // Fichier retrait.blade.php dans resources/views
    }
}