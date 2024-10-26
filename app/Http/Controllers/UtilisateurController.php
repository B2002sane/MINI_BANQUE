<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UtilisateurModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\CompteModel;

class UtilisateurController extends Controller
{
    public function loadALLUtilisateurs()
    {
        $all_utilisateurs = UtilisateurModel::where('role', 'distributeur')->get();
        return view('utilisateurs',compact('all_utilisateurs'));
    }
    public function loadAddUtilisateurForm()
    {
        return view('add-utilisateur');
    }

    public function AddUtilisateur(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'adresse' => 'required|string|max:100',
            'cni' => 'required|string|unique:utilisateur,cni|max:250',  // Correction ici
            'date_naissance' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'telephone' => 'required|string|unique:utilisateur,telephone',  // Correction ici
            'password' => 'required',
        ]);

        try {
            // Gestion de la photo
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('distributeurs', 'public');
            }

            // Création de l'utilisateur
            $utilisateur = UtilisateurModel::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'cni' => $request->cni,
                'date_naissance' => $request->date_naissance,
                'role' => 'distributeur',
                'photo' => $photoPath,
                'password' => Hash::make($request->password),
            ]);
             // Générer un numéro de compte unique
             do {
                $numeroCompte = rand(1000000000, 9999999999); // Génère un numéro de compte à 10 chiffres
            } while (CompteModel::where('numeroCompte', $numeroCompte)->exists());

            // Création du compte associé
            $compte = new CompteModel([
                'id_utilisateur' => $utilisateur->id,
                'numeroCompte' => $numeroCompte,
                'solde' => 0,
                'statut' => 1, // 1 pour actif
                'date_creation' => now(),
                'date_suppression' => null
            ]);

            $compte->save();

            DB::commit();

            return redirect()->back()->with('success', 'Utilisateur créé avec succès');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }
    public function loadEditForm($id){
        $utilisateur =UtilisateurModel::find($id);
        return view('edit-utilisateur', compact('utilisateur'));
    }
    public function EditUtilisateur(Request $request){
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'adresse' => 'required|string|max:100',
            'cni' => 'required|string|unique:utilisateur,cni|max:250',  // Correction ici
            'date_naissance' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'telephone' => 'required|string|unique:utilisateur,telephone',  // Correction ici
            'password' => 'required',
        ]);
        try {
            // Gestion de la photo
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('distributeurs', 'public');
            }

            // Modification de de l'utilisateur
            $update_utilisateur = UtilisateurModel::where('id',$request->utilisateur_id)->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'cni' => $request->cni,
                'date_naissance' => $request->date_naissance,
                'role' => 'distributeur',
                'photo' => $photoPath,
                'password' => Hash::make($request->password),
            ]);
              
            

            return redirect()->back()->with('success', 'Utilisateur créé avec succès');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }
    public function deleteUtilisateur($id)
{
    try {
        $utilisateur = UtilisateurModel::findOrFail($id);
        
        // Supprimer les comptes associés (si applicable)
        CompteModel::where('id_utilisateur', $id)->delete();

        // Supprimer l'utilisateur
        $utilisateur->delete();

        return response()->json(['success' => 'Utilisateur supprimé avec succès']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erreur lors de la suppression : ' . $e->getMessage()], 500);
    }
}
}