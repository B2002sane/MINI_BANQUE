<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Définir les colonnes remplissables
    protected $fillable = [
        'id_users',
        'montant',
        'type',
        'status',
        'frais',
    ];

    // Relation avec l'utilisateur
     public function user()
     {
         return $this->belongsTo(User::class, 'id_users');
     }

    //  Relation avec le compte
     public function compte()
     {
         return $this->hasOne(Compte::class, 'id_users');
     }
}
