<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisateurModel extends Model
{
    use HasFactory;

    protected $table = 'utilisateur'; // Spécifiez la table ici

    protected $fillable = [
        'nom', 'prenom', 'telephone', 'adresse', 'cni', 'date_naissance', 'role', 'photo', 'password',
    ];
}