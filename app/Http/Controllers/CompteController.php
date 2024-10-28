<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\User;

class CompteController extends Controller
{
    public function crediterDistributeur(Request $request)
    {
        $validated = $request->validate([
            'telephone' => ['required', 'regex:/^[0-9]{9}$/'], 
            'montant' => ['required', 'numeric','min:0'],
        ]);


        // Récupérer l'utilisateur à partir du numéro de téléphone
        $utilisateur = User::where([
            ['telephone', $validated['telephone']],
            ['role', 'distributeur'],
            ])->first();
        if (!$utilisateur){
            return back()->withErrors(['telephone' => 'L utilisateur n existe pas.']); 
        }

        // Récupérer le compte de l'utilisateur
        $compte = Compte::where('id_users', $utilisateur->id)->first();

        if ($compte) {
            // Ajouter le montant au solde existant
            $compte->solde += $validated['montant'];
            $compte->save();

            return back()->with('success', 'Compte crédité avec succès.');
        }

        return back()->withErrors(['telephone' => 'Le compte n\'existe pas pour cet utilisateur.']);
    }
}