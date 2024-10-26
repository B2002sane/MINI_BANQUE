<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\CompteModel;
use App\Models\UtilisateurModel;

class CompteController extends Controller
{
    public function crediterDistributeur(Request $request)
    {
        $validated = $request->validate([
            'distributor_number' => 'required|exists:utilisateur,telephone',
            'amount' => 'required|numeric|min:0',
        ]);

        // Récupérer l'utilisateur à partir du numéro de téléphone
        $utilisateur = UtilisateurModel::where('telephone', $validated['distributor_number'])->first();
        
        // Récupérer le compte de l'utilisateur
        $compte = CompteModel::where('id_utilisateur', $utilisateur->id)->first();
        
        if ($compte) {
            // Ajouter le montant au solde existant
            $compte->solde += $validated['amount'];
            $compte->save();

            return back()->with('success', 'Compte crédité avec succès.');
        }

        return back()->withErrors(['compte' => 'Le compte n\'existe pas pour cet utilisateur.']);
    }
}
