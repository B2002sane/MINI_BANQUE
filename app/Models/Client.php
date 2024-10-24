<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'users'; // Nom de votre table

    // Désactiver les timestamps si vous ne les utilisez pas
    public $timestamps = false;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'cni',
        'date_naissance',
        'role',
        'photo',
        'password',
        'date_creation',
        'date_modification',
        'date_suppression',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'date_creation' => 'datetime',
        'date_modification' => 'datetime',
        'date_suppression' => 'datetime',
    
    ];


    // Ajoutez cette relation
    public function compte()
    {
        return $this->hasOne(Compte::class, 'id_users', 'id');
    }

}
