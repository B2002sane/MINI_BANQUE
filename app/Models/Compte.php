<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $table = 'comptes';
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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users'); // 'id_users' est la clé étrangère
    }
}
