<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Assurez-vous que votre modèle User est correctement importé

class utilisateurSeeder extends Seeder
{
    public function run()
    {
        // Créer un utilisateur agent
        User::create([
            'nom' => 'Agent',
            'prenom' => 'Test',
            'telephone' => '775846934',
            'adresse' => '123 Rue de Test',
            'cni' => '123456789',
            'date_naissance' => '1990-01-01',
            'role' => 'agent',
            'photo' => 'default.jpg',
            'password' => Hash::make('password123'), // Mot de passe hashé
            'date_creation' => now(),
            'date_modification' => now(),
            'date_suppression' => null,
        ]);

        // Créer un utilisateur distributeur
        User::create([
            'nom' => 'Distributeur',
            'prenom' => 'Test',
            'telephone' => '784521546',
            'adresse' => '456 Rue de Test',
            'cni' => '987654321',
            'date_naissance' => '1992-02-02',
            'role' => 'distributeur',
            'photo' => 'default.jpg',
            'password' => Hash::make('password123'),
            'date_creation' => now(),
            'date_modification' => now(),
            'date_suppression' => null,
        ]);

        // Créer un utilisateur client
        User::create([
            'nom' => 'Client',
            'prenom' => 'Test',
            'telephone' => '785469324',
            'adresse' => '789 Rue de Test',
            'cni' => '321654987',
            'date_naissance' => '1995-03-03',
            'role' => 'client',
            'photo' => 'default.jpg',
            'password' => Hash::make('password123'),
            'date_creation' => now(),
            'date_modification' => now(),
            'date_suppression' => null,
        ]);
    }
}
