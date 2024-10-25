<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $table = 'compte';
    protected $fillable = [

        'id_users',
        'numero_compte',
        'solde', 
        'statut'
        
    ];


    public function client()
    {
        return $this->belongsTo(Client::class, 'id_users'); // 'id_users' est la clé étrangère
    }
}
