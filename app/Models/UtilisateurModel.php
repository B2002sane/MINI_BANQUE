<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class UtilisateurModel extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'utilisateur';

    protected $fillable = [
        'nom', 'prenom', 'telephone', 'adresse', 'cni', 'date_naissance', 'role', 'photo', 'password', 
    ];

    protected $hidden = [
        'password',
    ];
}
