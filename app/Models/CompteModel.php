<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteModel extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'compte';

    // Clé primaire
    protected $primaryKey = 'id';

    // Les champs pouvant être remplis
    protected $fillable = [
        'id_utilisateur',
        'numeroCompte',
        'solde',
        'statut',
        'date_creation',
        'date_suppression',
    ];

    // Si tu veux désactiver les timestamps automatiques (created_at et updated_at)
    public $timestamps = true;

    // Format de date pour les champs timestamp
    protected $dates = ['date_creation', 'date_suppression', 'created_at', 'updated_at'];
}
