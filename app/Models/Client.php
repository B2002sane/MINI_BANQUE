<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Si tu utilises une table personnalisée
    // protected $table = 'clients';

    protected $table = 'users'; 

    protected $fillable = [
        'role',
        'nom', 
        'prenom', 
        'telephone', 
        'date_naissance', 
        'adresse', 
        'cni', 
        'photo', 
        'password'
    ];


    public function compte()
    {
        return $this->hasOne(Compte::class, 'id_users'); // 'id_users' est la clé étrangère
    }
}