<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $table = 'compte';

    // Désactiver les timestamps si vous ne les utilisez pas
    public $timestamps = false;

    protected $fillable = [
        'id_users',
        'numeroCompte',
        'solde',
        'statut',
        'date_creation',
        'date_suppression'
    ];

    protected $casts = [
        'date_creation' => 'datetime',
        'date_suppression' => 'date'
    ];

    // Relation avec le modèle Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_users', 'id');
    }

}
