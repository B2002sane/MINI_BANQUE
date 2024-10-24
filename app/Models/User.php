<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs assignables en masse.
     *
     * @var array<int, string>
     */
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

    /**
     * Les attributs à cacher lors de la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_naissance' => 'date',
        'date_creation' => 'datetime',
        'date_modification' => 'datetime',
        'date_suppression' => 'date',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class, 'id_users');
    }

    public function compte()
{
    return $this->hasOne(Compte::class, 'id_users');
}

}
