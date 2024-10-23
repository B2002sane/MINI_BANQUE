<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributeur extends Model
{
 protected $table ='distributeurs'; 
 protected $fillable =[
    'user_id',        // Clé étrangère vers la table user
    'nom',            // Nom de l'utilisateur
    'prenom',         // Prénom de l'utilisateur
    'telephone',      // Numéro de téléphone
    'adresse',        // Adresse
    'cni',            // Numéro de carte d'identité
    'date_naissance', // Date de naissance
    'role',           // Rôle de l'utilisateur (agent, client, distributeur)
    'photo',          // Chemin vers la photo de l'utilisateur
    'password',
 ];
}
