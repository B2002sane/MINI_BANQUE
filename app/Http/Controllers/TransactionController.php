<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
        $userC = User::where('telephone', $validated['telephone'])->first();
        $dtb = Auth::user();

        if (!$userC) {
            return back()->withErrors(['telephone' => 'Client non trouvé.']);
        }

        // Récupérer le compte du client
        $compte = Compte::where('id_users', $userC->id)->first();
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

        if ($compteD->solde < $montantTotal) {
            return back()->withErrors(['telephone' => 'Compte distributeur insuffisant.']);
        }

        // Déduire le montant du solde
        $compte->solde -= $montantTotal;
        $compteD->solde = $compteD->solde - $montant + $frais;
        $compte->save();
        $compteD->save();

        // Enregistrer la transaction
        Transaction::create([
            'id_users' => $userC->id,
            'montant' => $montant,
            'type' => 'retrait',
            'status' => 1,
            'frais' => $frais,
            'expediteur' => $dtb->id,
        ]);



        // Retourner un message de succès
        return redirect()->back()->with('success', 'Retrait effectué avec succès.');
    }


    /*************************************Transfert********************************** */



    public function transfert(Request $request){
         // Validation des champs du formulaire
         $validated = $request->validate([
            'telephone' => ['required', 'regex:/^[0-9]{9}$/'],
            'montant' => ['required', 'integer', 'min:50'],
        ]);

        // Récupérer le client par téléphone
        $user1 = User::where('telephone', $validated['telephone'])->first();
        $user2 = Auth::user();

        if(!$user1){
            return to_route('transfert')->withErrors(['telephone' => 'Ne dispose pas de compte'])->onlyinput('telephone');
        }

        $compteD = Compte::where('id_users', $user1->id)->first();
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
            'id_users' => $user1->id,
            'montant' => $montantRecu,
            'type' => 'transfert',
            'status' => 1,
            'frais' => $frais,
            'expediteur' => $user2->id,
        ]);


        // Retourner un message de succès
        return redirect()->back()->with('success', 'transfert effectué avec succès.');
    }


 //**********************************************Depot******************** */   


    public function depot(Request $request)
    {
        // Validation des champs du formulaire
        $validated = $request->validate([
            'telephone' => ['required', 'regex:/^[0-9]{9}$/'],
            'montant' => ['required', 'integer', 'min:500'],
        ]);

        // Récupérer le client par téléphone
        $userC = User::where('telephone', $validated['telephone'])->first();
        $dtb = Auth::user();

        if (!$userC) {
            return back()->withErrors(['telephone' => 'Client non trouvé.']);
        }

        if (!$dtb) {
            return redirect()->route('login')->withErrors(['error' => 'Session expirée. Veuillez vous reconnecter.']);
        }

        // Récupérer le compte du client
        $compte = Compte::where('id_users', $userC->id)->first();
        $compteD = Compte::where('id_users', $dtb->id)->first();

        if (!$compte) {
            return back()->withErrors(['telephone' => 'Compte introuvable.']);
        }

        $montant = $validated['montant'];
        $frais = $montant * 0.01; // Calcul des frais de 1%
        $montantTotal = $montant - $frais;

        if ($compteD->solde < $montantTotal) {
            return back()->withErrors(['telephone' => 'Compte distributeur insuffisant.']);
        }

        // Déduire le montant du solde
        $compte->solde += $montantTotal;
        $compteD->solde = $compteD->solde - $montant + $frais;
        $compte->save();
        $compteD->save();

        // Enregistrer la transaction
        Transaction::create([
            'id_users' => $userC->id,
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


    /**************************************Annuler transfert******************************************* */




    public function annuler(Request $request){
        // Validation des champs du formulaire
        $validated = $request->validate([
           'telephone' => ['required', 'regex:/^[0-9]{9}$/'],
           'montant' => ['required', 'integer', 'min:50'],
           'telephone2' => ['required', 'regex:/^[0-9]{9}$/'],
       ]);

       // Récupérer le client par téléphone
       $user = User::where('telephone', $validated['telephone'])->first();
       $user2 = User::where('telephone', $validated['telephone2'])->first();

       if(!$user){
           return to_route('annuler')->withErrors(['telephone' => 'Ne dispose pas de compte'])->onlyinput('telephone');
       }

       if(!$user2){
        return to_route('annuler')->withErrors(['telephone2' => 'Ne dispose pas de compte'])->onlyinput('telephone2');
    }

       $transaction = Transaction::where([
        ['id_users', $user->id],
        ['montant', $validated['montant']],
        ['type', 'transfert'],
        ['expediteur', $user2->id]
       ])->latest()->first();

       if (!$transaction){
        return to_route('annuler')->withErrors(['montant' => 'transfert inexistant'])->onlyinput('telephone2');
       }

       $compteD = Compte::where('id_users', $user->id)->first();
       $compteE = Compte::where('id_users', $user2->id)->first();

       if (!$compteD && $user->role !== 'client') {
           return back()->withErrors(['telephone' => 'Compte introuvable.'])->withinput('telephone', 'montant');
       }

       if($compteD->statut === 0){
           return to_route('transfert')->withErrors(['telephone' => 'Compte bloqué'])->onlyinput('telephone');
       }

       if($compteE->statut === 0){
        return to_route('transfert')->withErrors(['telephone2' => 'Compte bloqué'])->onlyinput('telephone2');
    }

       $montantRecu = $validated['montant'];
       $frais = $montantRecu * 0.02; // Calcul des frais de 2%
       $montantEnvoye= $montantRecu + $frais;


       $compteD->solde -= $montantRecu;
       $compteE->solde += $montantEnvoye;

       $compteE->save();
       $compteD->save();

       // Enregistrer la transaction
       $transaction->delete();


       // Retourner un message de succès
       return redirect()->back()->with('success', 'transfert effectué avec succès.');
   }
}